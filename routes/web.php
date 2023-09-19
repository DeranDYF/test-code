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
Route::get('/indexing', [App\Http\Controllers\IndexingController::class, 'index'])->name('indexing');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('admin');
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role')->middleware('admin');


//TRANSACTION
Route::post('/add', [App\Http\Controllers\TransactionController::class, 'create'])->name('add');

//EXCEL TO DATABASE
Route::post('/import', [App\Http\Controllers\ExceltodbController::class, 'create'])->name('import');

//ADD , EDIT, DELETE USER
Route::post('/adduser', [App\Http\Controllers\UserController::class, 'create'])->name('adduser')->middleware('admin');
Route::any('/deleteuser/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser')->middleware('admin');
Route::any('/edituser/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser')->middleware('admin');

//ADD , EDIT, DELETE ROLE
Route::post('/addrole', [App\Http\Controllers\RoleController::class, 'create'])->name('addrole')->middleware('admin');
Route::any('/deleterole/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('deleterole')->middleware('admin');
Route::any('/editrole/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editrole')->middleware('admin');