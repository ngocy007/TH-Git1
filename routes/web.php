<?php

use App\Http\Controllers\quyenController;
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


//code group lai ntn ok
Route::group(['prefix' => 'admin','as' => 'quyen'],
static function()  {
   Route::get('/', [quyenController::class,'index']) ;
}
);
Route::get('/', static fn()=>'day la trang chu');