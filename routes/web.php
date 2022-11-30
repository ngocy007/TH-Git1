<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChuongController;

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

//Pham An Chi
Route::get('/truyen', [TruyenController::class, 'index']);
Route::get('/truyen/create', [TruyenController::class, 'create']);
Route::post('/truyen/store', [TruyenController::class, 'store']);

Route::get('/chuong/{id}', [ChuongController::class, 'index']);
Route::get('/chuong/create/{id}', [ChuongController::class, 'create']);
Route::post('/chuong/store/{id}', [ChuongController::class, 'store']);