@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Jenis Buku</h3><br><br>
        <div>
            <a href="{{ url('admin/tambah-kurikulum') }}" class="btn btn-primary">Add</a>
            {{-- <a href="{{ url('admin/tambah-kurikulum') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add</a> --}}
        </div><br><br>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama-kategori">Nama Kategori</label>
                                <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="datatable">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($jenis as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="#" class="btn btn-primary mb-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ url('admin/hapus-kurikulum/' . $item->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus {{ $item->name }} ?')"><i
                                            class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kurikulum</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
