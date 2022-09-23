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
    Route::get('api/admin/booking', [AdminController::class, 'getBooking'])->name('api.admin.booking');
    Route::put('admin/booking/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.booking.update-status');

    // Route::get('admin/data-booking', [AdminController::class, 'bookingunverif']);
    Route::get('admin/data-buku', [AdminController::class, 'buku']);
    Route::get('api/admin/data-buku', [AdminController::class, 'getBuku'])->name('api.admin.data-buku');
    Route::get('api/admin/data-buku/{id}', [AdminController::class, 'getBukuDetailById'])->name('api.admin.data-buku-detail');

    Route::get('admin/buku-digital', [AdminController::class, 'bukudigital']);
    Route::get('admin/buku-kejuruan', [AdminController::class, 'bukukejuruan']);
    Route::get('admin/kategori-buku', [AdminController::class, 'kategori']);
    Route::get('admin/kurikulum-buku', [AdminController::class, 'kurikulum']);

    Route::get('admin/jenis-buku', [AdminController::class, 'jenisBuku']);

    // CRUD
    // Buku
    Route::get('admin/tambah-buku/', [CrudController::class, 'createBuku']);
    Route::post('admin/simpan-buku/', [CrudController::class, 'storeBuku']);
    Route::get('admin/edit-buku/{id}', [CrudController::class, 'editBuku']);
    Route::post('admin/update-buku/{id}', [CrudController::class, 'updateBuku']);
    Route::delete('admin/hapus-buku/{id}', [CrudController::class, 'destroyBuku']);

    Route::get('admin/tambah-detail-buku/{id}', [CrudController::class, 'createDetailBuku']);
    Route::post('admin/simpan-detail-buku/', [CrudController::class, 'storeDetailBuku']);
    Route::get('admin/edit-detail-buku/{id}', [CrudController::class, 'editDetailBuku']);
    Route::post('admin/update-detail-buku/{id}', [CrudController::class, 'updateDetailBuku']);
    Route::delete('admin/hapus-detail-buku/{id}', [CrudController::class, 'destroyDetailBuku']);

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
Route::get('/download-ebook/{id}', [SiswaController::class, 'downloadEbook']);
Route::get('/katalog', function () {
    return redirect()->to('/katalog/kurikulum-merdeka');
});
Route::get('/katalog/{slug}', [SiswaController::class, 'katalog'])->name('katalog');
Route::post('booking', [SiswaController::class, 'booking']);
