<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Present;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function contributions(Request $request)
    {
        $user = $request->user();

        $contributions = $user->contributions()
            ->with(['present.owner'])
            ->orderByDesc('created_at')
            ->get();

        // total across all presents
        $totalAmount = $contributions->sum('amount');

        return view('presents.my-contributions', [
            'contributions' => $contributions,
            'totalAmount'   => $totalAmount,
        ]);
    }

    public function destroy(Contribution $contribution)
    {
        if ($contribution->user_id !== auth()->id()) {
            abort(403, 'You cannot delete this contribution.');
        }

        $contribution->delete();

        return back()->with('status', 'contribution-deleted');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'present_id' => ['required', 'exists:presents,id'],
            'amount'     => ['required', 'integer', 'min:0'],
        ]);

        $present = Present::findOrFail($validated['present_id']);

        Contribution::updateOrCreate(
            [
                'user_id'    => $request->user()->id,
                'present_id' => $present->id,
            ],
            [
                'amount' => $validated['amount'],
            ]
        );

        return back()->with('status', 'contribution-saved');
    }
}
