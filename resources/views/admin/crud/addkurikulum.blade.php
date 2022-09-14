@extends('layout.template_admin')

@section('content')
    <div class="page-heading">
        <h3>Tambah Kategori</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/simpan-kurikulum') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Kurikulum</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Kurikulum Merdeka"
                    name="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
