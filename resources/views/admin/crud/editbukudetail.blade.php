@extends('layout.template_admin')

@section('content')
    {{-- @dd($buku) --}}
    <div class="page-heading">
        <h3>Tambah Kategori</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/simpan-buku') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $buku->id }}">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Judul Buku" name="judul" autofocus
                    value="{{ $buku->judul }}" readonly>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pengarang Buku</label>
                <input type="text" class="form-control @error('pengarang') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Pengarang" name="pengarang" autofocus
                    value="{{ $buku->pengarang }}" readonly>
                @error('pengarang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">penerbit Buku</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Penerbit" name="penerbit" autofocus
                    value="{{ $buku->penerbit }}" readonly>
                @error('penerbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Buku</label>
                <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Jenis Buku" name="jenis_buku" autofocus
                    value="{{ $buku->jenis_buku }}" readonly>
                @error('jenis_buku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">kategori Buku</label>
                <input type="text" class="form-control @error('kategori_buku') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Kategori Buku" name="kategori_buku" autofocus
                    value="{{ $buku->kategori_buku }}" readonly>
                @error('kategori_buku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Induk Buku</label>
                <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder=".../SMKN7/H.2021" name="no_induk" autofocus required>
                @error('no_induk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ISBN Buku</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="exampleFormControlInput1"
                    placeholder="ISBN (International Standard Book Number)" name="isbn" autofocus>
                @error('isbn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
