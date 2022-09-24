@extends('layout.template_admin')

@section('content')
    <div class="page-heading">
        <h3>Tambah Jenis Buku</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/update-jenis-buku/' . $jenis->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Fisik" name="keterangan" value="{{ $jenis->keterangan }}" autofocus>
                @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
