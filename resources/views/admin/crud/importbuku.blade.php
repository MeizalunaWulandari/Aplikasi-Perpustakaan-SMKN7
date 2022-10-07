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
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
