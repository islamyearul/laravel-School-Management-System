<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use  App\Http\Controllers\user\UserController;
use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\StudentClassController;
use App\Http\Controllers\backend\YearController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/admin', function () {
    return view('backend/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend/dashboard');
})->name('dashboard');


Route::get('user.logout', [AdminController::class, 'logout'])->name('user.logout');
Route::get('/admin/users', [AdminController::class, 'index']);
Route::get('/admin/user-add', [AdminController::class, 'addUser']);
Route::post('/admin/user-store', [AdminController::class, 'storeUser']);
Route::get('/admin/user-edit/{id}', [AdminController::class, 'edituser']);
Route::post('/admin/user-update/{id}', [AdminController::class, 'updateuser']);
Route::get('/admin/user-delete/{id}', [AdminController::class, 'deleteuser']);

Route::resource('/admin/group', GroupController::class );
Route::resource('/admin/class', StudentClassController::class );
Route::resource('/admin/year', YearController::class );

route::prefix('/admin/group')->group(function(){
    

});

