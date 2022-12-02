<?php


use App\Http\Controllers\Dat\HomeController;
use App\Http\Controllers\y\chuongController;
use App\Http\Controllers\y\truyenController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
/*admin*/
Route::resource('/admintheloai',\App\Http\Controllers\Admin\theloaiController::class);
Route::resource('/adminquyen',\App\Http\Controllers\Admin\quyenController::class);
Route::get('/admin',[\App\Http\Controllers\Admin\theloaiController::class,'index2']);
Route::resource('/trangchuadmin',\App\Http\Controllers\Admin\trangchuController::class);
Route::resource('/admintruyen',\App\Http\Controllers\Admin\truyenController::class);
Route::resource('/adminbinhluan',\App\Http\Controllers\Admin\binhluanController::class);
Route::resource('/adminuser',\App\Http\Controllers\Admin\userController::class);
Route::resource('/adminthongke',\App\Http\Controllers\Admin\thongkeController::class);


Route::get('/', [HomeController::class, 'index']);
Route::get('/truyen/{id}', [truyenController::class, 'show'])->name('xemtruyen');
Route::get('/truyen/{id_truyen}/chuong-{id_chuong}', [chuongController::class, 'show'])->name('doctruyen');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   Route::get('/truyen/follow/{id}', [truyenController::class, 'follow'])->name('theogioi');
   Route::post('/truyen/{id_truyen}', [truyenController::class, 'create_comment'])->name('bltruyen');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


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

Route::get('/leaderboard', [\App\Http\Controllers\Viet\LeaderboardController::class, 'index']);
