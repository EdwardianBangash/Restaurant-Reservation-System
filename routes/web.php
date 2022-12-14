<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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


Route::get('/Dashboard/categories', [DashboardController::class, 'categories'])->name('categories');
Route::get('/Dashboard/createCategory', [DashboardController::class, 'createCategory'])->name('createCategory');
Route::get('/Dashboard/editCategory/{id}', [DashboardController::class, 'editCategory'])->name('editCategory');

Route::get('/Dashboard/tables', [DashboardController::class, 'tables'])->name('tables');
Route::get('/Dashboard/createTable', [DashboardController::class, 'createTable'])->name('createTable');
Route::get('/Dashboard/editTable/{id}', [DashboardController::class, 'editTable'])->name('editTable');