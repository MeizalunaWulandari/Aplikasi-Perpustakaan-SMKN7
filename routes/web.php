<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});
// Siswa
Route::get('login', [LoginController::class, 'index']);
// Route::get('register', [LoginController::class, 'create']);
Route::post('login/authenticate', [LoginController::class, 'authenticate']);
// Admin
Route::get('login-admin', [LoginController::class, 'loginAdmin']);
Route::post('login/authenticate-admin', [LoginController::class, 'authenticateAdmin']);
Route::get('logout', [LoginController::class, 'logout']);
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/buku-fisik', [AdminController::class, 'bukufisik']);
    Route::get('admin/buku-digital', [AdminController::class, 'bukudigital']);
    Route::get('admin/buku-kejuruan', [AdminController::class, 'bukukejuruan']);
    Route::get('admin/kategori-buku', [AdminController::class, 'kategori']);
    Route::get('admin/kurikulum-buku', [AdminController::class, 'kurikulum']);
});
