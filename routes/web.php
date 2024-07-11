<?php

use App\Http\Controllers\EventsController;
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
    Route::post('createevent',[EventsController::class, 'store'])->name('createevents');
    Route::get('createevent',[EventsController::class, 'create'])->name('createevent');

});
require __DIR__.'/auth.php';
