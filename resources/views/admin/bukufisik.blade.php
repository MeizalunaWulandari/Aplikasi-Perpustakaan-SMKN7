@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Data Buku</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalScrollable">Add</a>
            </div>
            <form action="" method="post">
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Buku</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="cover-buku">Cover Buku</label>
                                    <input type="file" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="judul-buku">Judul Buku</label>
                                    <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="number" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="tempat-terbit">Tempat Terbit</label>
                                    <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="tahun-terbit">Tahun Terbit</label>
                                    <input type="number" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="no-klasifikasi">No. Klasifikasi</label>
                                    <input type="number" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="inisaial-buku">Inisial Buku</label>
                                    <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="no-induk">No. Induk</label>
                                    <input type="number" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="jenis-buku">Jenis Buku</label>
                                    <input type="text" id="nama-kategori" class="form-control" name="nama_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="kategori-buku">Kategori Buku</label>
                                    <select id="nama-kategori" class="form-control" name="nama_kategori">
                                        <option value="">Pilih Kategori</option>
                                        <option value="">Sejarah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Catatan</label>
                                    <textarea type="text" id="nama-kategori" class="form-control" name="nama_kategori"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Accept</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-sm-inline-block">
                <a href="#" class="btn btn-primary">Export</a>
            </div>
        </div>
    </div>
    <div class="datatable">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tempat Terbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah</th>
                    <th>No. Klasifikasi</th>
                    <th>Inisial Buku</th>
                    <th>No. Induk</th>
                    <th>Jenis Buku</th>
                    <th>Kategori Buku</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                    <td>...</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Cover Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tempat Terbit</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah</th>
                    <th>No. Klasifikasi</th>
                    <th>Inisial Buku</th>
                    <th>No. Induk</th>
                    <th>Jenis Buku</th>
                    <th>Kategori Buku</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
@endsection
