<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('login', [LoginController::class, 'index']);
// Route::get('register', [LoginController::class, 'create']);
Route::post('login/authenticate', [LoginController::class, 'authenticate']);

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/getMapel/', [AdminController::class, 'getMapel']);
    // Route::get('admin/data-booking', [AdminController::class, 'bookingunverif']);
    Route::get('admin/buku-digital', [AdminController::class, 'bukudigital']);
    Route::get('admin/buku-kejuruan', [AdminController::class, 'bukukejuruan']);
    Route::get('admin/kategori-buku', [AdminController::class, 'kategori']);
    Route::get('admin/kurikulum-buku', [AdminController::class, 'kurikulum']);

    Route::get('api/admin/booking', [AdminController::class, 'getBooking'])->name('api.admin.booking');
});

// Siswa
Route::get('/', [SiswaController::class, 'index']);
Route::get('/book-detail', [SiswaController::class, 'detail']);
Route::get('/all-book', [SiswaController::class, 'allbook']);
Route::get('/user/profile', [UserController::class, 'index']);
Route::group(['middleware' => ['user']], function () {
    Route::get('logout', [LoginController::class, 'logout']);
});