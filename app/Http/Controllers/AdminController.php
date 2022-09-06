<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $booking = BookingModel::all();
        $data = [
            'title' => 'Admin Perpustakaan',
            'booking' => $booking,
        ];
        return view('admin.databooking', $data);
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
        $data = [
            'title' => 'Admin Perpustakaan | Kategori',
        ];
        return view('admin.kategori', $data);
    }
    public function kurikulum()
    {
        $data = [
            'title' => 'Admin Perpustakaan | Kurikulum',
        ];
        return view('admin.kurikulum', $data);
    }
}
