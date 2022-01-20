<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use  App\Http\Controllers\user\UserController;
use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\StudentClassController;
use App\Http\Controllers\backend\YearController;
use App\Http\Controllers\backend\setup\ShiftController;
use App\Http\Controllers\backend\setup\HolidaysController;
use App\Http\Controllers\backend\setup\FeesCategoryController;
use App\Http\Controllers\backend\setup\ExamController;
use App\Http\Controllers\backend\setup\SubjectController;
use App\Http\Controllers\backend\setup\EduSessionController;
use App\Http\Controllers\backend\student\StudentController;

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

//Setup
Route::resource('/admin/group', GroupController::class );
Route::resource('/admin/class', StudentClassController::class );
Route::resource('/admin/year', YearController::class );
Route::resource('/admin/shift', ShiftController::class );
Route::resource('/admin/holidays', HolidaysController::class );
Route::resource('/admin/feescategory', FeesCategoryController::class );
Route::resource('/admin/exam', ExamController::class );
Route::resource('/admin/subject', SubjectController::class );
Route::resource('/admin/session', EduSessionController::class );

//Student Management
Route::resource('/admin/student', StudentController::class );


route::prefix('/admin/group')->group(function(){
    

});

