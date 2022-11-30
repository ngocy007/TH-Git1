<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\anchi\TruyenController;
use App\Http\Controllers\anchi\ChuongController;

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

//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

//Pham An Chi
Route::get('anchi-truyen', [TruyenController::class, 'index']);
Route::get('anchi-truyen/create', [TruyenController::class, 'create']);
Route::post('anchi-truyen/store', [TruyenController::class, 'store']);
Route::get('anchi-truyen/show/{id}', [TruyenController::class, 'show']);
Route::get('anchi-truyen/edit/{id}', [TruyenController::class, 'edit']);
Route::put('anchi-truyen/update/{id}', [TruyenController::class, 'update']);
Route::delete('anchi-truyen/destroy/{id}', [TruyenController::class, 'destroy']);

Route::get('/chuong/{id}', [ChuongController::class, 'index']);
Route::get('/chuong/create/{id}', [ChuongController::class, 'create']);
Route::post('/chuong/store/{id}', [ChuongController::class, 'store']);


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');

// });

// can thiet cho verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
