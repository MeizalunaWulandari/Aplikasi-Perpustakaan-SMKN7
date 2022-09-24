<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\JenisModel;
use App\Models\KatkurModel;

use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        $booking = BookingModel::where('status', '1')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Data Booking',
            'booking' => $booking,
        ];
        return view('admin.databooking', $data);
    }
    public function getBooking(Request $request)
    {
        $data = BookingModel::query();

        if ($request->status) {
            $data = $data->where('status', $request->status);
        }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
    public function updateStatus(Request $request, BookingModel $id)
    {
        $id->status = $request->status;
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
                'tbelib_buku.no_klasifikasi',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.name as kategori'
            )
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', 'tbelib_jenis_buku.id');
            // ->where('tbelib_buku.jenis_id', 1) // Buku Fisik
            // ->get();
            // dd($request->jenis_id)
        ;
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
