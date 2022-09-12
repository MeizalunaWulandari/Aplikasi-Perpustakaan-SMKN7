<?php

namespace App\Http\Controllers;

use App\Models\CountModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $countBukuTelahDibaca = CountModel::where('keterangan', 'Buku Telah Dibaca')->first();
        $countTotalKunjungan = CountModel::where('keterangan', 'Total Kunjungan')->first();
        $countBukuTersedia = CountModel::where('keterangan', 'Buku Tersedia')->first();

        $data = [
            'countTelahDibaca' => $countBukuTelahDibaca,
            'countTotalKunjungan' => $countTotalKunjungan,
            'countBukuTersedia' => $countBukuTersedia,
        ];
        // dd($data);
        return view('siswa.home', $data);
    }
    public function detail()
    {
        return view('siswa.detail');
    }
    public function allbook()
    {
        return view('siswa.allbook');
    }
}
