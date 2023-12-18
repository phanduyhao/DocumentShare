<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DocumentController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\FileController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\SlideController;
use App\Http\Controllers\CommentMainController;
use App\Http\Controllers\admin\FavouriteController;
use App\Http\Controllers\admin\RateController;
use App\Http\Controllers\admin\DownloadController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\admin\ViewController;
use App\Http\Controllers\admin\SearchController;
use App\Http\Controllers\DocumentMainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeMainController;

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
Route::get('/',[HomeMainController::class,'welcome']);


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

// Tất cả tài liệu
Route::get('/tai-lieu', [DocumentMainController::class, 'allDocs'])->name('categories.allDocs');

// Danh sách tài liệu theo danh mục
Route::get('/tailieu/{categorySlug}', [DocumentMainController::class, 'index'])->name('categories.index');

// Chi tiết tài liệu
Route::get('/chitiet/{slug}', [DocumentMainController::class, 'details'])->name('documentMain.details');

Route::middleware(['auth'])->group(function() {

//    Upload Tài liệu
    Route::get('/upload',[DocumentMainController::class,'uploadPage'])->name('uploadPage');


    // Comment
    Route::post('sendComment',[CommentMainController::class,'store'])->name('sendComment');

//    Download
    Route::post('/download', [ActionController::class,'download']);
    Route::post('/update-score', [ActionController::class,'updateScore']);

//    View
    Route::post('/view', [ActionController::class,'view']);

//    Favourite
    Route::post('/favourite', [ActionController::class,'favourite']);

    //    UnFavourite
    Route::post('/unfavourite', [ActionController::class,'unfavourite']);

//    Rating
    Route::post('/rate', [ActionController::class,'rate']);

//    Profile
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::post('/profile-update/{user}', [ProfileController::class,'update'])->name('profile.update');
    Route::post('/change-password', [ProfileController::class,'resetPassword'])->name('profile.resetPass');
    Route::post('/upload-docs', [DocumentMainController::class,'upload'])->name('upload');


//    Vào Admin
    Route::middleware(['auth', 'checkLevel'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/',[HomeController::class,'home'])->name('admin');

//            User
            Route::get('/userAdmin',[UsersController::class,'userAdmin'])->name('userAdmin');
            Route::get('/user',[UsersController::class,'user'])->name('user');
            Route::post('/userAdmin',[UsersController::class,'store'])->name('user.store');
            Route::patch('/userAdmin/{user}',[UsersController::class,'update'])->name('user.update');
            Route::delete('/users/{id}', [UsersController::class,'destroy'])->name('users.destroy');

//            Slide
            Route::resource('slides', SlideController::class);
            Route::delete('/slides/{id}', [SlideController::class,'destroy'])->name('slides.destroy');
            Route::post('slides/delete-all', [SlideController::class,'deleteAllSlides'])->name('deleteAllSlide');

//            Categories
            Route::resource('cates', CategoryController::class);
            Route::delete('/cates/{id}', [CategoryController::class,'destroy'])->name('cates.destroy');
            Route::post('cates/delete-all', [CategoryController::class,'deleteAllCates'])->name('deleteAllCate');

//            Documents
            Route::resource('documents', DocumentController::class);
            Route::get('/documents-loading', [DocumentController::class, 'loading'])->name('documents.loading');
            Route::get('/documents-cancel', [DocumentController::class, 'cancel'])->name('documents.cancel');
            Route::patch('/documents/ok/{document}', [DocumentController::class, 'ok'])->name('documents.ok');
            Route::patch('/documents/cancel/{document}', [DocumentController::class, 'cancelAction'])->name('documents.cancelAction');
            Route::get('/documents/{slug}', [DocumentController::class, 'show'])->name('documents.show');
            Route::post('/documents/delete-all-ok', [DocumentController::class,'deleteAllDocOk'])->name('deleteAllOk');
            Route::post('/documents/delete-all-load', [DocumentController::class,'deleteAllDocLoading'])->name('deleteAllLoad');
            Route::post('/documents/delete-all-cancel', [DocumentController::class,'deleteAllDocCancel'])->name('deleteAllCancel');

//            Status
            Route::resource('statuses', StatusController::class);

//            Tag
            Route::resource('tags', TagController::class);
            Route::post('tags/delete-all', [TagController::class,'deleteAllTag'])->name('deleteAllTag');

//            Menu
            Route::resource('menus', MenuController::class);
            Route::post('menus/delete-all', [MenuController::class,'deleteAllMenus'])->name('deleteAllMenu');

//            Files
            Route::resource('files', FileController::class);
            Route::post('files/delete-all', [FileController::class,'deleteAllFiles'])->name('deleteAllFile');

//            Comments Admin
            Route::resource('comments', CommentController::class);
            Route::post('comments/delete-all', [CommentController::class,'deleteAllComment'])->name('deleteAllComment');

//            Favourites Admin
            Route::resource('favourites',FavouriteController::class);

//            Rates Admin
            Route::resource('rates',RateController::class);

//            Downloads Admin
            Route::resource('downloads',DownloadController::class);

//            Downloads Admin
            Route::resource('views',ViewController::class);

//            Settings Admin
            Route::resource('settings',SettingController::class);

//            Search
            Route::get('/search',[SearchController::class,'search'])->name('search');

        });
    });
});

