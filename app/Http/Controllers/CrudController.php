<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class CrudController extends Controller
{
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
            'type' => '2'
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
        $id->delete();
        return redirect()->to('admin/kurikulum-buku')->with('status', 'Berhasil menghapus ' . $kur);
    }
}
