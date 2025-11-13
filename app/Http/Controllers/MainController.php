<?php

namespace App\Http\Controllers;

use App\Models\Present;

class MainController extends Controller {
    public function index()
    {
        $presents = Present::all();
        return view('main', compact('presents'));
    }
}
