<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
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
Route::get('logout', [LoginController::class, 'logout']);

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
    Route::put('admin/booking/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.booking.update-status');
});

// Siswa
Route::get('/', [SiswaController::class, 'index']);
Route::get('/book-detail', [SiswaController::class, 'detail']);
Route::get('/all-book', [SiswaController::class, 'allbook']);
Route::get('/user', [SiswaController::class, 'user']);
