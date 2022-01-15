<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use  App\Http\Controllers\user\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('backend/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend/dashboard');
})->name('dashboard');

Route::get('user.logout', [AdminController::class, 'logout'])->name('user.logout');

Route::get('/admin/profile', [UserController::class, 'index']);
