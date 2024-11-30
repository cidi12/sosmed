<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\InteractionController;

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
Route::get('post',[PostController::class, 'index'])->name('post')->middleware('auth:member');
Route::get('profile',[ProfileController::class,'index'])->name('profile')->middleware('auth:member');
Route::get('viewpost/{id}',[ProfileController::class,'viewpost'])->name('viewpost')->middleware('auth:member');
Route::get('viewprofile/{id}',[ProfileController::class,'viewprofile'])->name('viewprofile')->middleware('auth:member');
Route::get('group',[GroupController::class, 'index'])->name('group')->middleware('auth:member');
Route::get('creategroup',[GroupController::class, 'createGroup'])->name('creategroup')->middleware('auth:member');



Route::post('register',[CredentialController::class,'register'])->name('register');
Route::post('login',[CredentialController::class, 'login'])->name('login');
Route::post('logout',[CredentialController::class, 'logout'])->name('logout');
Route::post('post',[PostController::class, 'post'])->name('post');
Route::post('comment/{id}',[CommentController::class, 'comment'])->name('comment');
Route::post('postcomment/{id}',[CommentController::class, 'postcomment'])->name('postcomment');
Route::post('like/{id}',[InteractionController::class, 'like'])->name('like');
Route::post('dislike/{id}',[InteractionController::class, 'dislike'])->name('dislike');
Route::post('addfriend/{id}',[InteractionController::class, 'addFriend'])->name('addfriend');
Route::post('makeGroup',[GroupController::class, 'makeGroup'])->name('makeGroup');

Route::get('/{any}', [CredentialController::class, 'index'])
    ->where('any', '.*')->middleware('guest:member');