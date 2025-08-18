<?php

use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\person_controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin routes 

    Route::get('/dashboard', [dashboard_controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


// admin routes 

//  person 

Route::get('/person/list', [person_controller::class, 'List'])->middleware(['auth', 'verified'])->name('person.list');

Route::get('/person/add', [person_controller::class, 'Add'])->middleware(['auth', 'verified'])->name('person.add');

Route::get('/person/edit/{id}', [person_controller::class, 'edit'])->middleware(['auth', 'verified'])->name('person.edit');


Route::post('/person/update/{id}', [person_controller::class, 'update'])->middleware(['auth', 'verified'])->name('person.update');

Route::get('/person/delete/{id}', [person_controller::class, 'delete'])->middleware(['auth', 'verified'])->name('person.delete');

Route::post('/person/store', [person_controller::class, 'store'])->middleware(['auth', 'verified'])->name('person.store');



//  person 





require __DIR__.'/auth.php';
