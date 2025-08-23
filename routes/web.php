<?php

use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\person_controller;
use App\Http\Controllers\work_controller;
use App\Http\Controllers\Chat_controller;




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

// work


Route::get('/work/list', [work_controller::class, 'List'])->middleware(['auth', 'verified'])->name('work.list');
Route::get('/work/add', [work_controller::class, 'Add'])->middleware(['auth', 'verified'])->name('work.add');
Route::get('/work/edit/{id}', [work_controller::class, 'edit'])->middleware(['auth', 'verified'])->name('work.edit');
Route::put('/work/update/{id}', [work_controller::class, 'update'])->middleware(['auth', 'verified'])->name('work.update');
Route::get('/work/delete/{id}', [work_controller::class, 'delete'])->middleware(['auth', 'verified'])->name('work.delete');
Route::post('/work/store', [work_controller::class, 'store'])->middleware(['auth', 'verified'])->name('work.store');
Route::get('/work/step/list/{id}', [work_controller::class, 'stepList'])->middleware(['auth', 'verified'])->name('work.step.list');

Route::post('/work-steps/update-status', [work_controller::class, 'updateStatus'])->name('worksteps.update');

Route::post('/workstep-option/update', [work_controller::class, 'updateWorkStepOption'])->name('workstepoption.update');

Route::get('/cattree-show', [Chat_controller::class, 'cattree_show'])->middleware(['auth', 'verified'])->name('cattree.show');


Route::get('/Chat', [Chat_controller::class, 'Chat'])->middleware(['auth', 'verified'])->name('Chat.show');



Route::get('/work/track/{id}/{category}/{client}', [Chat_controller::class, 'work_track'])->name('work.track');

Route::get('/chat/send/whatsapp/{id}', [Chat_controller::class, 'sendWhatsApp'])->name('Chat.send.whatsapp');



// work






require __DIR__.'/auth.php';
