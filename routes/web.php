<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//MAIN MENU
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/exceltodb', [App\Http\Controllers\ExceltodbController::class, 'index'])->name('exceltodb');
Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('admin');
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role')->middleware('admin');


//TRANSACTION
Route::post('/add', [App\Http\Controllers\TransactionController::class, 'create'])->name('add');


//ADD , EDIT, DELETE CATEGORY
Route::post('/addcategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('addcategory');
Route::any('/deletecategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deletecategory');
Route::any('/editcategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editcategory');

//ADD , EDIT, DELETE USER
Route::post('/adduser', [App\Http\Controllers\UserController::class, 'create'])->name('adduser');
Route::any('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
Route::any('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser');

//ADD , EDIT, DELETE ROLE
Route::post('/addrole', [App\Http\Controllers\RoleController::class, 'create'])->name('addrole');
Route::any('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('deleterole');
Route::any('/editrole/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editrole');
