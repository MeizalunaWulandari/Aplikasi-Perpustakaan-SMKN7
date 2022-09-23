<?php

namespace App\Http\Controllers;

use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\JenisModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class CrudController extends Controller
{

    // Buku
    public function createBuku()
    {
        $kategori = KategoriModel::all();
        $jenis = JenisModel::all();

        $data = [
            'title' => 'CRUD',
            'kategori' => $kategori,
            'jenis' => $jenis,
        ];
        return view('admin.crud.addbuku', $data);
    }
    public function storeBuku(Request $request)
    {
        // dd($request);
        // dd(SlugService::createSlug(BukuModel::class, 'slug', $request->file('pdf')->getClientOriginalName()) . '.pdf');
        $validated = [
            'cover' => 'required',
            'judul' => 'required|unique:tbelib_buku',
            'pengarang' => 'required',
            'singkatan_pengarang' => 'required',
            'tempat_terbit' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'tahun_buku' => 'required',
            'inisial' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            // 'pdf' => 'pdf',
        ];

        $customMessages = [
            'cover.required' => 'Cover buku wajib diisi!',
            // 'cover.image' => 'Cover buku harus berupa gambar!',
            'judul.required' => 'Judul buku wajib diisi!',
            'judul.unique' => 'Judul buku tidak boleh sama!',
            'pengarang.required' => 'Pengarang buku wajib diisi!',
            'singkatan_pengarang.required' => 'Singkatan nama pengarang buku wajib diisi!',
            'tempat_terbit.required' => 'Tempat terbit buku wajib diisi!',
            'penerbit.required' => 'Penerbit buku wajib diisi!',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi!',
            'no_klasifikasi.required' => 'Nomor klasifikasi buku wajib diisi!',
            'tahun_buku.required' => 'Tahun buku wajib diisi!',
            'inisial.required' => 'Inisial buku wajib diisi!',
            'kategori_id.required' => 'Kategori buku wajib diisi!',
            'jenis_id.required' => 'Jenis buku wajib diisi!',
        ];
        if ($request->jenis_id == 1) {
            $validated['no_klasifikasi'] = 'required';
        } else if ($request->jenis_id != 1) {
            $validated['pdf'] = 'required';
        }
        // if ($request->file('cover')) {
        //     $validated['cover'] = $request->file('cover')->store('book-cover');
        // }
        $this->validate($request, $validated, $customMessages);

        if ($request->file('pdf')) {
            $save = SlugService::createSlug(BukuModel::class, 'slug', $request->file('pdf')->getClientOriginalName()) . '.pdf';
            $request->file('pdf')->storeAs(
                'buku-digital',
                $save
            );
        } else {
            $save = null;
        }

        BukuModel::create([
            'slug' => SlugService::createSlug(BukuModel::class, 'slug', $request->judul),
            'cover' => $request->file('cover')->store('book-cover'),
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'singkatan_pengarang' => $request->singkatan_pengarang,
            'tempat_terbit' => $request->tempat_terbit,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'no_klasifikasi' => $request->no_klasifikasi,
            'tahun_buku' => $request->tahun_buku,
            'inisial_buku' => $request->inisial,
            'file_pdf' => $save,
            'jenis_id' => $request->jenis_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->to('admin/data-buku')->with('status', 'Berhasil menambah buku ' . $request->judul);
    }
    public function editBuku($id)
    {
        $buku = BukuModel::where('id', $id)->first();
        $kategori = KategoriModel::all();
        $jenis = JenisModel::all();

        $data = [
            'title' => 'CRUD',
            'buku' => $buku,
            'kategori' => $kategori,
            'jenis' => $jenis,
        ];

        return view('admin.crud.editbuku', $data);
    }
    public function updateBuku(Request $request, BukuModel $id)
    {
        $validated = [
            'pengarang' => 'required',
            'singkatan_pengarang' => 'required',
            'tempat_terbit' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'tahun_buku' => 'required',
            'inisial' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
        ];

        $customMessages = [
            'cover.required' => 'Cover buku wajib diisi!',
            // 'cover.image' => 'Cover buku harus berupa gambar!',
            'judul.required' => 'Judul buku wajib diisi!',
            'judul.unique' => 'Judul buku tidak boleh sama!',
            'pengarang.required' => 'Pengarang buku wajib diisi!',
            'singkatan_pengarang.required' => 'Singkatan nama pengarang buku wajib diisi!',
            'tempat_terbit.required' => 'Tempat terbit buku wajib diisi!',
            'penerbit.required' => 'Penerbit buku wajib diisi!',
            'tahun_terbit.required' => 'Tahun terbit buku wajib diisi!',
            'no_klasifikasi.required' => 'Nomor klasifikasi buku wajib diisi!',
            'tahun_buku.required' => 'Tahun buku wajib diisi!',
            'inisial.required' => 'Inisial buku wajib diisi!',
            'kategori_id.required' => 'Kategori buku wajib diisi!',
            'jenis_id.required' => 'Jenis buku wajib diisi!',
            'pdf.required' => 'File pdf wajib diisi!',
        ];
        if ($request->old_cover == '') {
            $validated['cover'] = 'required';
        }
        if ($request->judul != $id->judul) {
            $validated['judul'] = 'required|unique:tbelib_buku';
        }
        if ($request->jenis_id == 1) {
            $validated['no_klasifikasi'] = 'required';
        } else if ($request->jenis_id != 1) {
            $validated['pdf'] = 'required';
        }
        $this->validate($request, $validated, $customMessages);

        if ($request->file('pdf') == '') {
            $save = $request->old_pdf;
            $id->file_pdf = $save;
        } else if ($request->file('pdf')) {
            if ($request->old_pdf) {
                Storage::delete('buku-digital/' . $request->old_pdf);
            }
            Storage::delete($request->old_pdf);
            $save = SlugService::createSlug(BukuModel::class, 'slug', $request->file('pdf')->getClientOriginalName()) . '.pdf';
            $request->file('pdf')->storeAs(
                'buku-digital',
                $save
            );
            $id->file_pdf = $save;
        }



        if ($request->judul == $id->judul) {
            $slug = $request->old_slug;
        } else {
            $slug = SlugService::createSlug(BukuModel::class, 'slug', $request->judul);
        }

        if ($request->file('cover') != '') {
            if ($request->old_cover) {
                Storage::delete($request->old_cover);
            }
            $img = $request->file('cover')->store('book-cover');
            $id->cover = $img;
        }

        $id->update([
            'slug' => $slug,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'singkatan_pengarang' => $request->singkatan_pengarang,
            'tempat_terbit' => $request->tempat_terbit,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'no_klasifikasi' => $request->no_klasifikasi,
            'tahun_buku' => $request->tahun_buku,
            'inisial_buku' => $request->inisial,
            'jenis_id' => $request->jenis_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->to('admin/data-buku')->with('status', 'Berhasil mengubah buku ' . $request->judul);
    }
    public function destroyBuku(BukuModel $id)
    {
        $id->delete();
        Storage::delete([$id->cover, 'buku-digital/' . $id->file_pdf]);
    }

    // Detail Buku
    public function createDetailBuku($id)
    {
        $buku = BukuModel::where('tbelib_buku.id', $id)
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', '=', 'tbelib_kategori.id')
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', '=', 'tbelib_jenis_buku.id')
            ->select(
                'tbelib_buku.id',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.name as kategori_buku',
            )
            ->first();
        $data = [
            'title' => 'CRUD',
            'buku' => $buku
        ];
        return view('admin.crud.addbukudetail', $data);
    }
    public function storeDetailBuku(Request $request)
    {
        BukuDetailModel::create([
            'no_induk' => $request->no_induk,
            'isbn' => $request->isbn,
            'status' => 1,
            'buku_id' => $request->id
        ]);

        return redirect()->to('/admin/data-buku')->with('status', 'Buku berhasil ditambah');
    }
    public function editDetailBuku($id)
    {
        $bukuDetail = BukuDetailModel::where('tbelib_buku_detail.id', $id)
            ->join('tbelib_buku', 'tbelib_buku_detail.buku_id', 'tbelib_buku.id')
            ->select(
                'tbelib_buku.id as id_buku',
                'tbelib_buku_detail.id as id_detail',
                'tbelib_buku_detail.no_induk',
                'tbelib_buku_detail.isbn',
            )
            ->first();
        $buku = BukuModel::where('tbelib_buku.id', $bukuDetail->id_buku)
            ->join('tbelib_jenis_buku', 'tbelib_buku.jenis_id', 'tbelib_jenis_buku.id')
            ->join('tbelib_kategori', 'tbelib_buku.kategori_id', 'tbelib_kategori.id')
            ->select(
                'tbelib_buku.id as id_buku',
                'tbelib_buku.judul',
                'tbelib_buku.pengarang',
                'tbelib_buku.penerbit',
                'tbelib_buku.penerbit',
                'tbelib_jenis_buku.keterangan as jenis_buku',
                'tbelib_kategori.name as kategori_buku',
            )
            ->first();
        $data = [
            'title' => 'CRUD',
            'bukuDetail' => $bukuDetail,
            'buku' => $buku,
        ];
        // dd($buku);

        return view('admin.crud.editbukudetail', $data);
    }
    public function updateDetailBuku(Request $request, $id)
    {
        $buku = BukuModel::where('tbelib_buku.id', $request->id)
            ->first();

        BukuDetailModel::where('id', $id)
            ->update([
                'no_induk' => $request->no_induk,
                'isbn' => $request->isbn,
                'status' => 1,
                'buku_id' => $request->id
            ]);

        return redirect()->to('/admin/data-buku')->with('status', 'Detail buku dengan judul ' . $buku->judul . ' dan nomor induk ' . $request->no_induk . ' berhasil di update!');
    }
    public function destroyDetailBuku(BukuDetailModel $id)
    {
        $id->delete();
    }

    // Kategori
    public function createKategori()
    {
        $data = [
            'title' => 'CRUD',
        ];
        return view('admin.crud.addkategori', $data);
    }
    public function storeKategori(Request $request)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function editKategori($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function updateKategori(Request $request, $id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function destroyKategori($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }

    // Kurikulum
    public function createKurikulum()
    {
        $data = [
            'title' => 'CRUD',
        ];
        return view('admin.crud.addkurikulum', $data);
    }
    public function storeKurikulum(Request $request)
    {
        $validated = [
            'name' => 'required|unique:tbelib_kategori|max:150',
        ];
        $customMessages = [
            'name.required' => 'Kurikulum wajib diisi!',
            'name.unique' => 'Kurikulum tidak boleh sama!',
            'name.max' => 'Kurikulum tidak boleh lebih dari 150 karakter!',
        ];
        $this->validate($request, $validated, $customMessages);

        KategoriModel::create([
            'name' => $request->name,
            'type' => '2',
            'slug' => SlugService::createSlug(KategoriModel::class, 'slug', $request->name),
        ]);

        return redirect()->to('admin/kurikulum-buku')->with('status', 'Berhasil menambah ' . $request->name);
    }
    public function editKurikulum($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function updateKurikulum(Request $request, $id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function destroyKurikulum($id)
    {
        $kur = KategoriModel::where('id', $id)->first();
        $kur->delete();
        return redirect()->to('admin/kurikulum-buku')->with('status', 'Berhasil menghapus ' . $kur->name);
    }
}
