<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\CountModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $countBukuTelahDibaca = CountModel::where('keterangan', 'Buku Telah Dibaca')->first();
        $countTotalKunjungan = CountModel::where('keterangan', 'Total Kunjungan')->first();
        $countBukuTersedia = CountModel::where('keterangan', 'Buku Tersedia')->first();
        $bukuFisik = BukuModel::join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->select(
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.stock',
                'tbelib_buku.slug as slug_buku',
                'tbelib_jenis_buku.keterangan',
                'tbelib_kategori.slug as slug_kategori',
                'tbelib_jenis_buku.keterangan as jenis_buku',
            )
            ->where('tbelib_jenis_buku.keterangan', 'Fisik')
            ->get();
        $bukuDigital = BukuModel::join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->select(
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.stock',
                'tbelib_buku.slug as slug_buku',
                'tbelib_jenis_buku.keterangan',
                'tbelib_kategori.slug as slug_kategori',
                'tbelib_jenis_buku.keterangan as jenis_buku',
            )
            // ->whereNot(function ($query) {
            //     $query->where('keterangan', 'Fisik');
            // })
            ->get();
        // $tes = BukuModel::whereHas('tbelib_jenis_buku', function ($query) {
        //     $query->where('keterangan', '!=', 'Fisik');
        // })->get();


        $data = [
            'countTelahDibaca' => $countBukuTelahDibaca,
            'countTotalKunjungan' => $countTotalKunjungan,
            'countBukuTersedia' => $countBukuTersedia,
            'bukuFisik' => $bukuFisik,
            'bukuDigital' => $bukuDigital,
        ];
        // dd($data);
        return view('siswa.home', $data);
    }
    public function katalog($slug)
    {
        $buku = BukuModel::join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->select(
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.stock',
                'tbelib_buku.slug as slug_buku',
                'tbelib_jenis_buku.keterangan',
                'tbelib_kategori.slug as slug_kategori',
                'tbelib_jenis_buku.keterangan as jenis_buku',
            )
            ->where('tbelib_kategori.slug', $slug)
            ->get();
        $kategoriLoop = KategoriModel::all();
        $kategori = KategoriModel::where('slug', $slug)->first();
        // dd($kategori);

        $data = [
            'buku' => $buku,
            'kategoriLoop' => $kategoriLoop,
            'kategori' => $kategori,
        ];
        return view('siswa.katalog', $data);
    }
    public function detail($slug)
    {
        $buku = BukuModel::where('tbelib_buku.slug', $slug)
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->select(
                'tbelib_buku.id as id_buku',
                'tbelib_buku.cover',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.tahun_buku',
                'tbelib_buku.tahun_terbit',
                'tbelib_buku.stock',
                'tbelib_buku.slug as slug_buku',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.slug as slug_kategori',
                'tbelib_kategori.name as nama_kategori',
            )
            ->first();
        $data = [
            'buku' => $buku,
        ];
        return view('siswa.detail', $data);
    }
    public function user()
    {
        return view('siswa.user');
    }
}
