<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\TourEditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookTourController;




// use App\Http\Controllers\UserDetailController;

use App\Http\Controllers\LoginController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Bắt buộc đăng nhập
Route::middleware('auth')->group(function () {
    Route::resource('/tours',TourController::class)->except(['index','show']);
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
    Route::resource('/categories',CategoryController::class)->except(['index','show']);
    Route::resource('/users',UserController::class)->except(['index','show']);



    
});

//không cần đăng nhập
//route login
// xử lý yêu cầu đăng nhập và hiển thị form đăng nhập cho người dùng
Route::get('/login',[LoginController::class, 'formLogin'])->name('login');

// xử lý yêu cầu đăng nhập được gửi từ form đăng nhập và thực hiện quá trình xác thực thông qua phương thức POST.
Route::post('/login',[LoginController::class, 'authenticate'])->name('login');

//đăng xuất

Route::resource('/tours',TourController::class)->only(['index','show']);
Route::post('/tours/upload', [TourController::class, 'upload'])->name('ckeditor.upload');


Route::resource('/categories',CategoryController::class)->only(['index','show']);
Route::resource('/users',UserController::class)->only(['index','show']);

Route::resource('/posts',PostController::class);
Route::resource('/comments',CommentController::class);
Route::resource('/book-tour',BookTourController::class);



// Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
route::post('/upload',[CKEditorController::class, 'upload'])->name('ckeditor.upload');
route::post('/loadimage',[TourEditorController::class, 'loadimage'])->name('toureditor.loadimage');

Route::post('/success', [BookTourController::class, 'success'])->name('success');

// //route thanh toán vnpay
Route::get('/vnpay', [BookTourController::class, 'vnpay_payment'])->name('vnpay.vnpay_payment');

//in hóa đơn
Route::get('book-tours/{bookTour}/download-invoice', [BookTourController::class, 'download_invoice'])->name('book-tour.download_invoice');




Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/dashboard', function () {
    return view('dashboard');
});


