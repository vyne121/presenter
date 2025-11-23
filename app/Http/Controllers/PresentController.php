<?php

namespace App\Http\Controllers;

use App\Models\Present;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Present::with(['owner', 'contributions'])
            ->selectRaw('presents.*,
        CASE
            WHEN price > 0
                 AND (SELECT COALESCE(SUM(amount),0) FROM contributions WHERE contributions.present_id = presents.id) >= price
            THEN 1
            ELSE 0
        END AS is_fully_funded
    ')
            ->orderBy('is_fully_funded', 'asc')
            ->orderBy('created_at', 'desc');

        // 1) SEARCH: name, description, owner name
        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('owner', function ($ownerQuery) use ($search) {
                        $ownerQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($priceFilter = $request->input('price')) {
            if ($priceFilter === 'cheap') {
                $query->where('price', '<', 15000);
            } elseif ($priceFilter === 'expensive') {
                $query->where('price', '>=', 15000);
            }
        }

        if ($request->boolean('mine') && $request->user()) {
            $query->where('user_id', $request->user()->id);
        }

        $presents = $query->paginate(10)->withQueryString();

        return view('presents.presents', compact('presents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presents.create');
    }

    public function mypresents()
    {
        $presents = auth()->user()
            ->presents()
            ->latest()
            ->get();
        return view('presents.my-presents', compact('presents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Present::$rules);

        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->withErrors(['message' => 'HIBA: be kell jelentkezned']);
        }


        $request->user()->presents()->create([
            'name'        => $validated['name'],
            'link'        => $validated['link'] ?? null,
            'price'       => $validated['price'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);
        return redirect()->route('presents.my')->with('status', 'present-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Present $present)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Present $present)
    {
        return view('presents.edit', compact('present'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Present $present)
    {
        $validated = $request->validate(Present::$rules);

        $present->update([
            'name'        => $validated['name'],
            'link'        => $validated['link'] ?? null,
            'price'       => $validated['price'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('presents.my')
            ->with('status', 'present-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $present = Present::findOrFail($request->present);
        $user = Auth::user();

        if (!$user->admin == 1 && $user->id != $present->user_id) {
            return Redirect::to('/presents')->withErrors(['message' => 'HIBA: csak a saját ajándékaidat törölheted']);
        } else {
            $present->delete();
            return back()->with('status', 'present-deleted');
        }

    }
}
