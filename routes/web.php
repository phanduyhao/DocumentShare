<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DocumentController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\TagController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Đăng ký
Route::get('/register',[AuthController::class,'showRegistrationForm'])->name('register');
Route::post('/registerFrom',[AuthController::class,'register'])->name('registerForm');
// Đăng nhập bình thường
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/loginForm',[AuthController::class,'login'])->name('loginForm')->middleware('throttle_logins'); // Ngăn chặn dò mật khẩu
// Đăng xuất
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
// Đăng nhập bằng google
Route::get('auth/google', [AuthController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class,'handleGoogleCallback']);

// Route hiển thị form quên mật khẩu
Route::get('/forgot-password', [AuthController::class,'showLinkRequestForm'])->name('forgetPassForm');
// Route xử lý yêu cầu reset mật khẩu
Route::post('/forgot-password', [AuthController::class,'sendResetLinkEmail'])->name('forgetPassRequest');
// Route hiển thị form đặt lại mật khẩu
Route::get('/reset-password/{token}', [AuthController::class,'showResetForm'])->name('password.reset');
// Route xử lý việc đặt lại mật khẩu
Route::post('/reset-password', [AuthController::class,'reset'])->name('reset');

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::middleware(['auth', 'checkLevel'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/',[HomeController::class,'home'])->name('admin');

//            User
            Route::get('/userAdmin',[UsersController::class,'userAdmin'])->name('userAdmin');
            Route::get('/user',[UsersController::class,'user'])->name('user');
            Route::post('/userAdmin',[UsersController::class,'store'])->name('user.store');
            Route::patch('/userAdmin/{user}',[UsersController::class,'update'])->name('user.update');
            Route::delete('/users/{id}', [UsersController::class,'destroy'])->name('users.destroy');
//            Categories
            Route::resource('cates', CategoryController::class);
            Route::delete('/cates/{id}', [CategoryController::class,'destroy'])->name('cates.destroy');

//            Documents
            Route::resource('documents', DocumentController::class);
            Route::get('/documents/{slug}', [DocumentController::class, 'show'])->name('documents.show');

//            Status
            Route::resource('statuses', StatusController::class);

//            Tag
            Route::resource('tags', TagController::class);
        });
    });
});

