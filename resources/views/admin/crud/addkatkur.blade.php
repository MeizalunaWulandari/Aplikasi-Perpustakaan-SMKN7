@extends('layout.template_admin')

@section('content')
    <div class="page-heading">
        <h3>Tambah Kategori - Kurikulum</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/simpan-katkur') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1"
                    placeholder="Kurikulum Merdeka" name="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select @error('jenis') is-invalid @enderror" aria-label="Default select example" name="jenis">
                    <option value="" selected>Jenis</option>
                    <option value="1">Kategori</option>
                    <option value="2">Kurikulum</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
