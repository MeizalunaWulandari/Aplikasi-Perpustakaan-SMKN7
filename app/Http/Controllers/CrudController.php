<?php

namespace App\Http\Controllers;

use App\Models\BukuDetailModel;
use App\Models\BukuModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;

class CrudController extends Controller
{

    // Kategori
    public function createBukufisik($id)
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
        return view('admin.crud.addbuku', $data);
    }
    public function storeBukufisik(Request $request)
    {
        BukuDetailModel::create([
            'no_induk' => $request->no_induk,
            'isbn' => $request->isbn,
            'status' => 1,
            'buku_id' => $request->id
        ]);
        
        return redirect()->to('/admin/buku-fisik')->with('status', 'Buku berhasil ditambah');
    }
    public function editBukufisik($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function updateBukufisik(Request $request, $id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function destroyBukufisik(BukuModel $id)
    {
        $id->delete();
        // return redirect('/admin/buku-fisik')->with('status', 'Buku berhasil dihapus!');
    }
    public function editBukuDetailfisik($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function updateBukuDetailfisik(Request $request, $id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
    }
    public function destroyBukuDetailfisik($id)
    {
        $data = [
            'title' => 'CRUD',
        ];
        //
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
