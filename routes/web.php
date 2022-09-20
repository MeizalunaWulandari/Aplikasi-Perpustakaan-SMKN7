<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CrudController;
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
// Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [LoginController::class, 'index']);
    Route::post('login/authenticate', [LoginController::class, 'authenticate']);
// });
// Route::get('register', [LoginController::class, 'create']);
Route::get('logout', [LoginController::class, 'logout']);

// Admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/getMapel/', [AdminController::class, 'getMapel']);
    // Route::get('admin/data-booking', [AdminController::class, 'bookingunverif']);
    Route::get('admin/buku-fisik', [AdminController::class, 'bukufisik']);
    Route::get('api/admin/buku-fisik', [AdminController::class, 'getBukuFisik'])->name('api.admin.buku-fisik');
    Route::get('api/admin/buku-fisik/{id}', [AdminController::class, 'getBukuFisikDetailById'])->name('api.admin.buku-fisik-detail');

    Route::get('admin/buku-digital', [AdminController::class, 'bukudigital']);
    Route::get('admin/buku-kejuruan', [AdminController::class, 'bukukejuruan']);
    Route::get('admin/kategori-buku', [AdminController::class, 'kategori']);
    Route::get('admin/kurikulum-buku', [AdminController::class, 'kurikulum']);

    Route::get('api/admin/booking', [AdminController::class, 'getBooking'])->name('api.admin.booking');
    Route::put('admin/booking/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.booking.update-status');

    // CRUD
    // Buku
    Route::get('admin/tambah-buku/{id}', [CrudController::class, 'createBukufisik']);
    Route::post('admin/simpan-buku/', [CrudController::class, 'storeBukufisik']);
    Route::delete('admin/hapus-buku/{id}', [CrudController::class, 'destroyBukufisik']);

    // Kategori
    Route::get('admin/tambah-kategori', [CrudController::class, 'createKategori']);

    // Kurikulum
    Route::get('admin/tambah-kurikulum', [CrudController::class, 'createKurikulum']);
    Route::post('admin/simpan-kurikulum', [CrudController::class, 'storeKurikulum']);
    Route::delete('admin/hapus-kurikulum/{id}', [CrudController::class, 'destroyKurikulum']);

});

// Siswa
Route::get('/', [SiswaController::class, 'index']);
// ROute::post('/search-book', [SiswaController::class, 'searchHome']);
Route::get('/book-detail/{slug}', [SiswaController::class, 'detail']);
Route::get('/katalog', function(){
    return redirect()->to('/katalog/kurikulum-merdeka');
});
Route::get('/katalog/{slug}', [SiswaController::class, 'katalog'])->name('katalog');
Route::post('booking', [SiswaController::class, 'booking']);