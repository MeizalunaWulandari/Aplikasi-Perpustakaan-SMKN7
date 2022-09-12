<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KategoriModel;

use Illuminate\Http\Request;
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
    public function getBooking(Request $request){
        $data = BookingModel::query();

        if($request->status){
            $data = $data->where('status', $request->status);
        }
        $data = $data->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
    public function bukufisik()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Buku',
        ];
        return view('admin.bukufisik', $data);
    }
    public function bukudigital()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Buku',
        ];
        return view('admin.bukudigital', $data);
    }
    public function bukukejuruan()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Data Buku',
        ];
        return view('admin.bukukejuruan', $data);
    }
    public function kategori()
    {
        $kategori = KategoriModel::where('type', '1')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Kategori',
            'kategori' => $kategori,
        ];
        return view('admin.kategori', $data);
    }
    public function kurikulum()
    {
        $kurikulum = KategoriModel::where('type', '2')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Kurikulum',
            'kurikulum' => $kurikulum,
        ];
        return view('admin.kurikulum', $data);
    }
}
