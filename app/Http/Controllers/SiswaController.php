<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\CountModel;
use App\Models\KategoriModel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // dd($bukuFisik);
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
            ->where('tbelib_jenis_buku.keterangan', '!=', 'Fisik')
            ->get();

        $bukuNonteks = BukuModel::join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
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
            ->where('tbelib_jenis_buku.keterangan', '==', 'Nonteks')
            ->get();

        $kategori = KategoriModel::all();
        $kategoriLoop = KategoriModel::all();

        $data = [
            'countTelahDibaca' => $countBukuTelahDibaca,
            'countTotalKunjungan' => $countTotalKunjungan,
            'countBukuTersedia' => $countBukuTersedia,
            'bukuFisik' => $bukuFisik,
            'bukuDigital' => $bukuDigital,
            'bukuNonteks' => $bukuNonteks,
            'kategori' => $kategori,
            'kategoriLoop' => $kategoriLoop,
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
        if (request('search-book')) {
            // dd($slug);
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
                ->where('tbelib_buku.judul', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_buku.pengarang', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_buku.penerbit', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_jenis_buku.keterangan', 'like', '%' . request('search-book') . '%')
                ->get();
        }
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
                'tbelib_buku.file_pdf',
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
    public function booking(Request $request)
    {
        $booking = BukuDetailModel::inRandomOrder()
            ->where('tbelib_buku_detail.buku_id', $request->id)
            ->where('tbelib_buku_detail.status', 1)
            ->first();

        // dd(Auth::guard('websiswa')->user()->nama);
        BookingModel::create([
            // 'buku_id' => $booking->id,
            'notelp' => $request->notelp,
            'nisn' => Auth::guard('websiswa')->user()->username,
            'nama' => Auth::guard('websiswa')->user()->nama,
            'status' => 1,
        ]);

        return redirect()->back()->with('status', 'Berhasil mem-booking buku, silahkan ambil buku ke perpustakaan dengan batas waktu 2 hari!');
    }
    public function downloadEbook($id)
    {
        $buku = BukuModel::select('file_pdf')->where('id', $id)->first();

        $path = public_path() . '/storage/buku-digital/' . $buku->file_pdf;
        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($path, $buku->file_pdf, $headers);
    }
    public function user()
    {
        return view('siswa.user');
    }
}
