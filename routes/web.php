<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect()->route('contacts.list'); // Redirect directly to the contact list page
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('register/thankyou', function () {
    return view('auth.thankyou');
})->name('register.thankyou');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contacts/list', [ContactController::class, 'index'])->name('contacts.list');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    Route::get('/contacts/add', [ContactController::class, 'create'])->name('contacts.add');
    Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

    // Route to edit a specific contact
    Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/edit/{id}', [ContactController::class, 'update'])->name('contacts.update');

    // Route to handle contact deletion
    Route::delete('/contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.delete');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


});

require __DIR__.'/auth.php';
