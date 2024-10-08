<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class, 'index'])->name('login-form');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/register',[AuthController::class, 'register'])->name('register-form');
Route::post('/register/save',[AuthController::class, 'save'])->name('register-save');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/thank-you',[AuthController::class, 'success']);
    Route::get('/contacts',[ContactsController::class, 'index'])->name('contacts');
    Route::get('/contact/form',[ContactsController::class, 'form'])->name('contact.form');
    Route::get('/contact/edit/{id}',[ContactsController::class, 'edit'])->name('contact.edit-form');
    Route::post('/store',[ContactsController::class, 'store'])->name('contacts.store');
    Route::post('/update/{id}',[ContactsController::class, 'update'])->name('contact.update');

    Route::get('/search',[ContactsController::class, 'search']);
   
    Route::delete('/contacts/delete/{id}',[ContactsController::class, 'destroy'])->name('contact.destroy');

    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
});
