<?php

use App\Http\Controllers\CredentialController;
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

Route::get('/', [CredentialController::class, 'index'])->name('home')->middleware('guest');
Route::get('register', [CredentialController::class, 'register'])->name('register')->middleware('guest');

Route::get('/{any}', [CredentialController::class, 'index'])
    ->where('any', '.*')->middleware('guest');