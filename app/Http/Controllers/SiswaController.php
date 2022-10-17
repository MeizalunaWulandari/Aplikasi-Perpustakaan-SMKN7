<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\CountModel;
use App\Models\JenisModel;
use App\Models\JurusanModel;
use App\Models\KatkurModel;
use App\Models\KelasModel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

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

        $kategori = KatkurModel::all();
        $kategoriLoop = KatkurModel::all();

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
        $kategoriLoop = KatkurModel::all();
        $kategori = KatkurModel::where('slug', $slug)->first();
        $jenis = JenisModel::all();
        $jurusan = JurusanModel::all();
        $kelas = KelasModel::all();
        $data = [
            'buku' => $buku,
            'kategoriLoop' => $kategoriLoop,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'kelas' => $kelas,
            'jurusan' => $jurusan,
        ];
        return view('siswa.katalog', $data);
    }
    public function getBukuFilter(Request $request)
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
                'tbelib_buku.jenis_id',
                'tbelib_buku.kategori_id',
                'tbelib_jenis_buku.keterangan',
                'tbelib_kategori.slug as slug_kategori',
                'tbelib_jenis_buku.keterangan as jenis_buku',
            )
            ->where('tbelib_kategori.slug', $request->slug);

        if ($request->search) {
            $buku = $buku->where('tbelib_buku.judul', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_buku.pengarang', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_buku.penerbit', 'like', '%' . request('search-book') . '%')
                ->orWhere('tbelib_jenis_buku.keterangan', 'like', '%' . request('search-book') . '%');
        }
        // dd($request->jenis);
        if ($request->jenis) {
            foreach ($request->jenis as $jenis) {
                $buku = $buku->where('tbelib_buku.jenis_id', $jenis);
            }
        }
        $buku = $buku->get();
        dd($buku);
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
        BookingModel::create([
            'notelp' => $request->notelp,
            'nisn' => Auth::guard('websiswa')->user()->username,
            'nama' => Auth::guard('websiswa')->user()->nama,
            'buku_id' => $request->id,
            'status' => 1,
            'user_id' => Auth::guard('websiswa')->user()->id_user,
            'tanggal_booking' => date('Y-m-d H:i:s')
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
    public function history()
    {
        $jenis = JenisModel::all();
        $data = [
            'jenis' => $jenis
        ];
        // dd($history);
        return view('siswa.history', $data);
    }
    public function getHistory(Request $request)
    {
        // dd($request);
        $history = BookingModel::join('tbelib_buku', 'tbelib_booking.buku_id', 'tbelib_buku.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', 'tbelib_jenis_buku.id')
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', 'tbelib_kategori.id')
            ->select(
                'tbelib_booking.nama',
                'tbelib_booking.nisn',
                'tbelib_booking.tanggal_booking',
                'tbelib_buku.judul',
                'tbelib_buku.cover',
                'tbelib_buku.penerbit',
                'tbelib_buku.slug',
                'tbelib_buku.jenis_id',
                'tbelib_jenis_buku.keterangan',
                'tbelib_kategori.name',
            )
            ->where('user_id', Auth::guard('websiswa')->user()->id_user);

        if ($request->status) {
            $history = $history->where('status', $request->status);
        }

        if ($request->keyword) {
            $history = $history->where('judul', 'LIKE', '%' . $request->keyword . '%');
        }

        if ($request->date) {
            $history = $history->where(DB::raw('DATE_FORMAT(tanggal_booking,"%Y-%m-%d")'), $request->date);
        }

        if ($request->jenis) {
            $history = $history->where('jenis_id', $request->jenis);
        }

        $history = $history->get();

        // dd($request->date);
        return response()->json([
            'history' => $history,
            'status' => $request->status
        ]);
    }
}
