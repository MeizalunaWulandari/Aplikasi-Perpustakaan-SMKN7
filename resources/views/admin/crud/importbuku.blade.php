@extends('layout.template_admin')

@section('content')
    <div class="page-heading">
        <h3>Import Buku</h3>
    </div>
    <div class="page-body">
        <form action="{{ url('admin/import-buku') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">File Excel</label>
                        <input class="form-control" type="file" name="file_buku">
                    </div>
                </div>
            </div>
        </form>
        <button type="button" class="btn btn-primary">Simpan Semua</button>
        <button type="button" class="btn btn-danger">Batalkan Semua</button>
        <div class="datatable">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Singkatan Pengarang</th>
                        <th>Tempat Terbit</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Tahun Buku</th>
                        <th>No Klasifikasi</th>
                        <th>Inisial Buku</th>
                        <th>No Induk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($import as $item)
                        {{-- @dd($item->no_klasifikasi) --}}
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->pengarang }}</td>
                            <td>{{ $item->singkatan_pengarang }}</td>
                            <td>{{ $item->tempat_terbit }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>{{ $item->tahun_buku }}</td>
                            <td>{{ $item->no_klasifikasi }}</td>
                            <td>{{ $item->inisial_buku }}</td>
                            <td>{{ $item->no_induk }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <td><input type="checkbox" name="" id=""></td>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Singkatan Pengarang</th>
                        <th>Tempat Terbit</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Tahun Buku</th>
                        <th>No Klasifikasi</th>
                        <th>Inisial Buku</th>
                        <th>No Induk</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
