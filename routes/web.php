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
})->name('index');

//Login routes 
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', [DashboardController::class, 'makeLogin'])->name('makeLogin');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');


//Registration routes 
Route::get('/register', [DashboardController::class, 'register'])->name('register');
Route::post('/register', [DashboardController::class, 'makeRegister'])->name('makeRegister');



//Categories routes

Route::middleware(['auth','role'])->group(function () {
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/Dashboard/categories', [DashboardController::class, 'categories'])->name('categories');
    Route::get('/Dashboard/createCategory', [DashboardController::class, 'createCategory'])->name('createCategory');
    Route::post('/Dashboard/storeCategory', [DashboardController::class, 'storeCategory'])->name('storeCategory');
    Route::get('/Dashboard/editCategory/{id}', [DashboardController::class, 'editCategory'])->name('editCategory');
    Route::put('/Dashboard/updateCategory', [DashboardController::class, 'updateCategory'])->name('updateCategory');
    Route::post('/Dashboard/deleteCategory/{id}', [DashboardController::class, 'deleteCategory'])->name('deleteCategory');

    //menu routes

    Route::get('/Dashboard/menu', [DashboardController::class, 'menu'])->name('menu');
    Route::get('/Dashboard/createMenu', [DashboardController::class, 'createMenu'])->name('createMenu');
    Route::post('/Dashboard/storeMenu', [DashboardController::class, 'storeMenu'])->name('storeMenu');
    Route::get('/Dashboard/editMenu/{id}', [DashboardController::class, 'editMenu'])->name('editMenu');
    Route::put('/Dashboard/updateMenu', [DashboardController::class, 'updateMenu'])->name('updateMenu');
    Route::post('/Dashboard/deleteMenu/{menu}', [DashboardController::class, 'deleteMenu'])->name('deleteMenu');



    //Table routes

    Route::get('/Dashboard/tables', [DashboardController::class, 'tables'])->name('tables');
    Route::post('/Dashboard/storeTable', [DashboardController::class, 'storeTable'])->name('storeTable');
    Route::get('/Dashboard/createTable', [DashboardController::class, 'createTable'])->name('createTable');
    Route::get('/Dashboard/editTable/{id}', [DashboardController::class, 'editTable'])->name('editTable');
    Route::put('/Dashboard/updateTable', [DashboardController::class, 'updateTable'])->name('updateTable');
    Route::post('/Dashboard/deleteTable/{id}', [DashboardController::class, 'deleteTable'])->name('deleteTable');

    //Reservation routes

    Route::get('/Dashboard/reservations', [DashboardController::class, 'reservations'])->name('reservations');
    Route::post('/Dashboard/deleteReservation/{id}', [DashboardController::class, 'deleteReservation'])->name('deleteReservation');
});

Route::get('/Dashboard/createReservation', [DashboardController::class, 'createReservation'])->middleware('auth')->name('createReservation');
Route::post('/Dashboard/storeReservation', [DashboardController::class, 'storeReservation'])->name('storeReservation');
