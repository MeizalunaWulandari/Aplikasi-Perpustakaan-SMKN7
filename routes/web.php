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
    // Unverified Booking
    Route::get('admin/unverified-booking', [AdminController::class, 'unverifiedBooking']);
    Route::get('admin', function () {
        return redirect()->to('admin/unverified-booking');
    });
    Route::get('api/admin/bookingUnverified', [AdminController::class, 'getBookingUnverified'])->name('api.admin.bookingUnverified');

    // Verified Booking
    Route::get('admin/verified-booking', [AdminController::class, 'verifiedBooking']);
    Route::get('api/admin/bookingVerified', [AdminController::class, 'getBookingVerified'])->name('api.admin.bookingVerified');

    // Returned Booking
    Route::get('admin/returned-booking', [AdminController::class, 'returnedBooking']);
    Route::get('api/admin/bookingReturned', [AdminController::class, 'getBookingReturned'])->name('api.admin.bookingReturned');
    Route::get('api/admin/bookingReturned-detail/{id}', [AdminController::class, 'getBookingReturnedById'])->name('api.admin.bookingReturnedDetail');

    Route::put('admin/booking/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.booking.update-status');

    Route::get('api/admin/detail-buku/{bookingid}', [AdminController::class, 'getBukuDetailByBookingId'])->name('api.admin.detail-buku');

    Route::get('admin/data-buku', [AdminController::class, 'buku']);
    Route::get('api/admin/data-buku', [AdminController::class, 'getBuku'])->name('api.admin.data-buku');
    Route::get('api/admin/data-buku/{id}', [AdminController::class, 'getBukuDetailById'])->name('api.admin.data-buku-detail');


    Route::get('admin/buku-digital', [AdminController::class, 'bukudigital']);
    Route::get('admin/buku-kejuruan', [AdminController::class, 'bukukejuruan']);
    Route::get('admin/kategori-buku', [AdminController::class, 'kategori']);

    Route::get('admin/katkur-buku', [AdminController::class, 'katkur']);
    Route::get('api/admin/katkur-buku', [AdminController::class, 'getKatkur'])->name('api.admin.katkur');

    Route::get('admin/jenis-buku', [AdminController::class, 'jenisBuku']);
    Route::get('api/admin/jenis-buku', [AdminController::class, 'getJenis'])->name('api.admin.jenis-buku');

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

    Route::get('admin/import-buku', [CrudController::class, 'createImportBuku']);
    Route::post('admin/import-buku', [CrudController::class, 'storeImportBuku']);

    // Kategori
    Route::get('admin/tambah-kategori', [CrudController::class, 'createKategori']);

    // Kurikulum
    Route::get('admin/tambah-katkur', [CrudController::class, 'createKatkur']);
    Route::post('admin/simpan-katkur', [CrudController::class, 'storeKatkur']);
    Route::delete('admin/hapus-katkur/{id}', [CrudController::class, 'destroyKatkur']);

    // Jenis Buku
    Route::get('admin/tambah-jenis-buku', [CrudController::class, 'createJenisBuku']);
    Route::post('admin/simpan-jenis-buku', [CrudController::class, 'storeJenisBuku']);
    Route::get('admin/edit-jenis-buku/{id}', [CrudController::class, 'editJenisBuku']);
    Route::post('admin/update-jenis-buku/{id}', [CrudController::class, 'updateJenisBuku']);
    Route::delete('admin/hapus-jenis-buku/{id}', [CrudController::class, 'destroyJenisBuku']);
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
