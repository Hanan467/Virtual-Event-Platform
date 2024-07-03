<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','organizer'])->prefix('organizer')->name('organizer.')->group(function(){
    Route::get('dashboard', [HomeController::class, 'organizer'])->name('dashboard');
    // Route::get('myitems/listed',[ItemController::class, 'approved'])->name('myitems.listed');
    // Route::get('myitems/pending',[ItemController::class, 'pending'])->name('myitems.pending');
    // Route::get('additems',[ItemController::class, 'create'])->name('additems');
    // Route::post('additems',[ItemController::class, 'store'])->name('additem');

});
require __DIR__.'/auth.php';
