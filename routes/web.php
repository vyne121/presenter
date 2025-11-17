<?php

use App\Http\Controllers\ContributionController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/presents', [PresentController::class, 'mypresents'])->name('presents.my');
    Route::delete('/present/{present}', [PresentController::class, 'delete'])->name('present.delete');
    Route::get('/presents/create', [PresentController::class, 'create'])->name('presents.create');
    Route::post('/presents/create', [PresentController::class, 'store'])->name('presents.store');
    Route::get('/presents/{present}', [PresentController::class, 'edit'])->name('presents.edit');
    Route::put('/presents/{present}', [PresentController::class, 'update'])->name('presents.update');
    Route::get('/contributions', [ContributionController::class, 'contributions'])->name('contributions');
    Route::post('/contributions', [ContributionController::class, 'store'])->name('contributions.store');
    Route::delete('/contributions/{contribution}', [ContributionController::class, 'destroy'])->name('contributions.delete');
});

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/present/{present}', [PresentController::class, 'show'])->name('present.show');
Route::get('/presents', [PresentController::class, 'index'])->name('presents.index');
Route::get('/help', [HelpController::class, 'index'])->name('help.index');



require __DIR__.'/auth.php';

URL::forceScheme('https');
