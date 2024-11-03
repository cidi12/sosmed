<?php

use App\Http\Controllers\CredentialController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CredentialController::class, 'index'])->name('home')->middleware('guest:member');
Route::get('signup', [CredentialController::class, 'signUpPage'])->name('signup')->middleware('guest:member');
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth:member');

Route::post('register',[CredentialController::class,'register'])->name('register');
Route::post('login',[CredentialController::class, 'login'])->name('login');
Route::post('logout',[CredentialController::class, 'logout'])->name('logout');
Route::get('/{any}', [CredentialController::class, 'index'])
    ->where('any', '.*')->middleware('guest:member');