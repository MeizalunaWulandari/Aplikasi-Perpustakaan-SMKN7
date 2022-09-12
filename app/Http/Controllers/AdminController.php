<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function bookingunverif()
    {
        $booking = BookingModel::where('status', '1')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Unverified Booking',
            'booking' => $booking,
        ];
        return view('admin.databookingunverified', $data);
    }
    public function bookingverif()
    {
        $booking = BookingModel::where('status', '2')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Verified Booking',
            'booking' => $booking,
        ];
        return view('admin.databookingverified', $data);
    }
    public function getMapel(Request $request)
    {
        $guruId = $request->id;

        $dataMapel = BookingModel::where('status', $guruId)->get();
        // dd($dataMapel);
        return json_encode($dataMapel);
    }
    public function bookingduedate()
    {
        $booking = BookingModel::where('status', '2')->get();
        $data = [
            'title' => 'Admin Perpustakaan | Duedate Booking',
            'booking' => $booking,
        ];
        return view('admin.databookingduedate', $data);
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