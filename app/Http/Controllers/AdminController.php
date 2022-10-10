<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\JenisModel;
use App\Models\KatkurModel;
use App\Models\TmpBuku;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    // Unverified Booking
    public function unverifiedBooking()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Booking Belum Ter-verifikasi',
        ];
        return view('admin.databookingunverified', $data);
    }
    // Unverified Booking API
    public function getBookingUnverified(Request $request)
    {
        $data = BookingModel::query()
            ->selectRaw('tbelib_booking.id, tbelib_booking.nisn, tbelib_booking.nama, tbelib_booking.notelp, tbelib_buku.judul, tbelib_booking.status')
            ->join('tbelib_buku', 'tbelib_buku.id', 'tbelib_booking.buku_id');

        // if ($request->status) {
        $data = $data->where('status', 1);
        // }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    // Verified Booking
    public function verifiedBooking()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Booking Ter-verifikasi',
        ];
        return view('admin.databookingverified', $data);
    }
    // Verified Booking API
    public function getBookingVerified(Request $request)
    {
        $data = BookingModel::query()
            ->selectRaw(
                'tbelib_booking.id, 
                tbelib_booking.nisn, 
                tbelib_booking.nama, 
                tbelib_booking.notelp, 
                tbelib_buku.judul, 
                tbelib_booking.status,
                tbelib_booking.tanggal_peminjaman,
                tbelib_booking.tanggal_pengembalian,
                tbelib_booking.terlambat,
                tbelib_booking.denda'
            )
            ->join('tbelib_buku', 'tbelib_buku.id', 'tbelib_booking.buku_id');

        // if ($request->status) {
        $data = $data->where('status', 2);
        // }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }

    public function returnedBooking()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Booking Yang Telah Kembali',
        ];
        return view('admin.databookingreturned', $data);
    }
    public function getBookingReturned(Request $request)
    {
        $data = BookingModel::query()
            ->selectRaw(
                'tbelib_booking.id, 
                tbelib_booking.nisn, 
                tbelib_booking.nama, 
                tbelib_booking.notelp, 
                tbelib_buku.judul, 
                tbelib_booking.status,
                tbelib_booking.tanggal_peminjaman,
                tbelib_booking.tanggal_pengembalian,
                tbelib_booking.terlambat,
                tbelib_booking.denda'
            )
            ->join('tbelib_buku', 'tbelib_buku.id', 'tbelib_booking.buku_id');

        // if ($request->status) {
        $data = $data->where('tbelib_booking.status', 4);
        // }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
    public function getBookingReturnedById($id)
    {
        $data = BookingModel::join('tbelib_buku', 'tbelib_buku.id', 'tbelib_booking.buku_id')
            ->join('tbelib_buku_detail', 'tbelib_buku_detail.id', 'tbelib_booking.buku_detail_id')
            ->select(
                'tbelib_booking.tanggal_pengembalian',
                'tbelib_booking.terlambat',
                'tbelib_booking.denda',
                'tbelib_booking.tanggal_dikembalikan',
                'tbelib_buku_detail.no_induk',
            )
            ->where('tbelib_booking.nisn', $id)
            ->get();

        return response()->json(['booking' => $data]);
    }

    public function updateStatus(Request $request, BookingModel $id)
    {
        $id->status = $request->status;
        if ($request->status == 2) {
            $id->buku_detail_id = $request->detail_id;
            $id->tanggal_peminjaman = date("Y-m-d");
            $id->tanggal_pengembalian = date("Y-m-d", strtotime("+7 day"));
        }
        if ($request->status == 4) {
            $id->tanggal_dikembalikan = date("Y-m-d");
            $id->terlambat = $request->terlambat;
            $id->denda = $request->denda;
        }
        $id->update();

        return response()->json(['success' => 'true']);
    }
    public function buku()
    {
        $jenis = JenisModel::all();
        $kategori = KatkurModel::all();
        $buku = BukuModel::join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->where('tbelib_jenis_buku.keterangan', 'Fisik')
            ->select(
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.singkatan_pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.quantity',
                'tbelib_buku.no_klasifikasi',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.name as kategori'
            )
            ->get();
        // dd($buku);
        $data = [
            'title' => 'Admin Perpustakaan | Data Buku',
            'jenis_buku' => $jenis,
            'buku' => $buku,
            'kategori' => $kategori,
        ];
        return view('admin.buku', $data);
    }
    public function getBuku(Request $request)
    {
        $data = BukuModel::query()
            ->select(
                'tbelib_buku.id',
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.singkatan_pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.quantity',
                'tbelib_buku.stock',
                'tbelib_buku.no_klasifikasi',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.name as kategori'
            )
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', 'tbelib_jenis_buku.id');

        if ($request->jenis_id) {
            $data = $data->where('tbelib_buku.jenis_id', $request->jenis_id);
        }
        if ($request->kategori_id) {
            $data = $data->where('tbelib_buku.kategori_id', $request->kategori_id);
        }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
    public function getBukuDetailById($id)
    {
        $buku = BukuModel::query()
            ->selectRaw('tbelib_buku.*')
            ->where('tbelib_buku.id', $id)
            ->first();

        $detail = BukuDetailModel::where('buku_id', $id)->join('tbelib_buku', 'tbelib_buku_detail.buku_id', '=', 'tbelib_buku.id')
            ->select(
                'tbelib_buku.judul',
                'tbelib_buku.tahun_terbit',
                'tbelib_buku.tempat_terbit',
                'tbelib_buku.inisial_buku',
                'tbelib_buku_detail.id as id_detail',
                'tbelib_buku_detail.no_induk',
                'tbelib_buku_detail.isbn',
                'tbelib_buku_detail.status',
            )->get();

        return response()->json(['buku' => $buku, 'detail' => $detail]);
    }

    public function getBukuDetailByBookingId($id)
    {
        $booking = BookingModel::query()
            ->join('tbelib_buku', 'tbelib_buku.id', 'tbelib_booking.buku_id')
            ->leftjoin('tbelib_buku_detail', 'tbelib_buku_detail.id', 'tbelib_booking.buku_detail_id')
            ->where('tbelib_booking.id', $id)
            ->first();

        $detail = BookingModel::query()
            ->select(
                'tbelib_buku_detail.id',
                'tbelib_buku_detail.no_induk'
            )
            ->join('tbelib_buku_detail', 'tbelib_buku_detail.buku_id', 'tbelib_booking.buku_id')
            ->where('tbelib_booking.id', $id)
            ->where('tbelib_buku_detail.status', 1)
            ->get();

        return response()->json([
            'booking' => $booking,
            'detail' => $detail,
            'tanggal_peminjaman' => date("Y-m-d"),
            'tanggal_pengembalian' => $booking->status == 2 ? $booking->tanggal_pengembalian : date("Y-m-d", strtotime("+7 day")),
            'tanggal_dikembalikan' => date("Y-m-d"),
        ]);
    }

    public function getImport()
    {
        $import = TmpBuku::where('status', 1)->get();
        return response()->json([
            'import' => $import
        ]);
    }

    public function katkur()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Kategori - Kurikulum',
        ];
        return view('admin.katkur', $data);
    }
    public function getKatkur(Request $request)
    {

        if ($request->katkur == 1) {
            $katkur = KatkurModel::where('type', 1)->get();
        } else if ($request->katkur == 2) {
            $katkur = KatkurModel::where('type', 2)->get();
        } else {
            $katkur = KatkurModel::all();
        }

        return DataTables::of($katkur)
            ->addIndexColumn()
            ->toJson();
    }

    public function jenisBuku()
    {
        $jenis = JenisModel::all();
        $data = [
            'title' => 'Admin Perpustakaan | Jenis Buku',
            'jenis' => $jenis,
        ];
        return view('admin.jenis', $data);
    }
    public function getJenis()
    {
        $data = JenisModel::all();
        // $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
}
