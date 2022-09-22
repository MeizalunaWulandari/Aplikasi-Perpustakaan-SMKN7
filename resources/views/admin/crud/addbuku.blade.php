@extends('layout.template_admin')

@section('content')
    {{-- @dd($buku) --}}
    <div class="page-heading">
        <h3>Tambah Kategori</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/simpan-buku') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover *</label>
                        <input class="form-control @error('cover') is-invalid @enderror" type="file"
                            accept="image/png, image/gif, image/jpeg" id="cover" onchange="previewImage()"
                            name="cover">
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img class="img-preview img-fluid mt-3 img-thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul Buku *</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Judul Buku" name="judul" autofocus>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pengarang Buku *</label>
                        <input type="text" class="form-control @error('pengarang') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Pengarang" name="pengarang">
                        @error('pengarang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Singkatan Pengarang Buku *</label>
                        <input type="text" class="form-control @error('singkatan_pengarang') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Singkatan Pengarang" name="singkatan_pengarang">
                        @error('singkatan_pengarang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tempat Terbit Buku *</label>
                        <input type="text" class="form-control @error('tempat_terbit') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Tempat Terbit" name="tempat_terbit">
                        @error('tempat_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">penerbit Buku *</label>
                        <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Penerbit" name="penerbit">
                        @error('penerbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Terbit Buku *</label>
                        <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Tahun Terbit" name="tahun_terbit">
                        @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tahun Buku *</label>
                        <input type="text" class="form-control @error('tahun_buku') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="tahun Buku" name="tahun_buku">
                        @error('tahun_buku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Klasifikasi Buku *</label>
                        <input type="number" class="form-control @error('no_klasifikasi') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Nomor Klasifikasi Buku" name="no_klasifikasi">
                        @error('no_klasifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Inisial Buku *</label>
                        <input type="text" class="form-control @error('inisial') is-invalid @enderror"
                            id="exampleFormControlInput1" placeholder="Inisial Buku" name="inisial">
                        @error('inisial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                            aria-label="Default select example" name="kategori_id">
                            <option value="" selected>Pilih Kategori Buku</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('jenis_id') is-invalid @enderror"
                            aria-label="Default select example" name="jenis_id" id="jenis" onchange="myFunction()">
                            <option value="" selected>Pilih Jenis Buku</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                        @error('jenis_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3" style="display: none;" id="inputPdf">
                        <label for="formFile" class="form-label">File PDF *</label>
                        <input class="form-control @error('pdf') is-invalid @enderror" type="file"
                            accept="application/pdf"
                            name="pdf">
                        @error('pdf')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        {{-- <img class="img-preview img-fluid mt-3 img-thumbnail"> --}}
                    </div>
                </div>
            </div>
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection

@section('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#cover')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("jenis").value != '1';
            var y = document.getElementById("inputPdf");

            y.style.display = x === true ? "block" : "none";
        }
    </script>
@endsection
