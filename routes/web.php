<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\TutorialController;
use \App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class, 'index']);
//
Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings/store', [ListingController::class, 'store']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/tutorial', [TutorialController::class, 'index']);

Route::get('/tutorial/one', [TutorialController::class, 'singlerow']);
Route::get('/tutorial/pluck', [TutorialController::class, 'pluck']);
Route::get('/tutorial/chunks', [TutorialController::class, 'chunks']);
Route::get('/tutorial/lazy', [TutorialController::class, 'lazy']);
Route::get('/tutorial/join', [TutorialController::class, 'join']);
Route::get('/tutorial/leftjoin', [TutorialController::class, 'leftjoin']);
Route::get('/tutorial/rightjoin', [TutorialController::class, 'rightjoin']);


Route::get('/generate-qrcode', [QrCodeController::class, 'index']);
