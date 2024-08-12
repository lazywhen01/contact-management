<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

	// profile
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

	// users	
	Route::resource('users', UserController::class);

	// contacts
	Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
	Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
	Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
	Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
	Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
	Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.delete');

	// categories
	Route::resource('categories', CategoryController::class);
	
});

require __DIR__.'/auth.php';
