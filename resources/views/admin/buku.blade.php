@extends('layout.template_admin')
@section('assets-top')
    <style type="text/css">
        #table-buku td.details-control {
            background: url("{{ asset('imgassets/produk-arrow.png') }}") no-repeat center center;
            background-size: 40px;
            cursor: pointer;
        }

        #table-buku tr.shown td.details-control {
            background: url("{{ asset('imgassets/produk-arrow2.png') }}") no-repeat center center;
            background-size: 40px;
        }

        div.slider {
            display: none;
            margin: 0px;
        }

        table img {
            width: 30%;
        }
    </style>
@endsection
@section('content')
    <div class="page-heading">
        <h3>Data Buku</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-group">
                    <label for="filter">Filter Jenis Buku</label>
                    <select name="filter_jenis" id="filter_jenis" class="form-control" required>
                        <option value="" selected>Pilih Jenis Buku</option>
                        @foreach ($jenis_buku as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="filter">Filter Kategori</label>
                    <select name="filter_kategori" id="filter_kategori" class="form-control" required>
                        <option value="" selected>Pilih Kategori Buku</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- </div> --}}
            {{-- <div class="d-sm-flex align-items-center justify-content-end"> --}}
            <div class="d-sm-inline-block">
                <a href="{{ url('admin/tambah-buku') }}" class="btn btn-primary">Tambah Buku</a>
                <a href="#" class="btn btn-primary">Export</a>
            </div>
        </div>
        <br><br>
    </div>
    <div class="page-body">
        <div class="datatable">
            <table id="table-buku" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        {{-- <th>Singkatan Pengarang</th> --}}
                        <th>Penerbit</th>
                        <th>Jenis Buku</th>
                        <th>Quantity</th>
                        <th>Kategori</th>
                        <th>No Klasifikasi</th>
                        <th>Action</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($buku as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><a class="example-image-link" href="{{ asset('storage/' . $item->cover) }}"
                                    data-lightbox="example-1"><img style="width: 100px;" class="example-image"
                                        src="{{ asset('storage/' . $item->cover) }}" alt="image-1" /></a></td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->pengarang }}</td>
                            {{-- <td>{{ $item->singkatan_pengarang }}</td> --}}
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->jenis_buku }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->no_klasifikasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        {{-- <th>Singkatan Pengarang</th> --}}
                        <th>Penerbit</th>
                        <th>Jenis Buku</th>
                        <th>Quantity</th>
                        <th>Kategori</th>
                        <th>No Klasifikasi</th>
                        <th>Action</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const table = $('#table-buku').DataTable({
            dom: '<lf<t>ip>',
            // pageLength: 10,
            // bLengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.admin.data-buku') }}",
                data: function(d) {
                    d.jenis_id = $('select[name=filter_jenis]').val();
                    d.kategori_id = $('select[name=filter_kategori]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'cover',
                    name: 'cover'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'pengarang',
                    name: 'pengarang'
                },
                // {
                //     data: 'singkatan_pengarang',
                //     name: 'singkatan_pengarang'
                // },
                {
                    data: 'penerbit',
                    name: 'penerbit'
                },
                {
                    data: 'jenis_buku',
                    name: 'jenis_buku'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'no_klasifikasi',
                    name: 'no_klasifikasi'
                },
                {
                    className: 'actions-control',
                    data: 'null',
                    defaultContent: '<a href="/admin/tambah-detail-buku/2" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i></a> <a href="/admin/edit-buku/2" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>'
                },
                {
                    className: 'details-control',
                    data: 'null',
                    defaultContent: ''
                }
            ],
            columnDefs: [{
                    render: function(data, type, row, meta) {
                        const cover = "{{ asset('storage') }}/" + row.cover;

                        const html = `<a class="example-image-link" href="${cover}"
                                    data-lightbox="example-1"><img style="width: 100px;" class="example-image"
                                        src="${cover}" alt="image-1" /></a>`;

                        return html;
                    },
                    targets: [1]
                },
                {
                    render: function(data, type, row, meta) {
                        // console.log(row);
                        const cover = "{{ asset('imgassets') }}/" + row.cover;

                        const html =
                            `<a href="/admin/tambah-detail-buku/${row.id}" class="btn btn-primary mb-2" title="Tambah buku baru dengan judul ${row.judul} "><i class="bi bi-file-earmark-plus"></i></a>` +
                            `<a href="/admin/edit-buku/${row.id}" class="btn btn-primary mb-2"><i class="bi bi-pencil-square"></i></a>` +
                            `<button class="btn btn-danger hapus-buku" data-id="${row.id}" data-judul="${row.judul}"><i class="bi bi-trash3"></i></button>`;

                        return html;
                    },
                    targets: [9]
                },
            ],
            order: [],
            language: {
                search: "",
                searchPlaceholder: "Search"
            }
        });

        $('#filter_jenis').change(function() {
            table.draw();
        });

        $('#filter_kategori').change(function() {
            table.draw();
        });

        $('#table-buku tbody').on('click', 'td button.hapus-buku ', function() {
            // console.log($(this).attr("data-judul"));
            const judul = $(this).attr("data-judul");
            if (confirm(`Yakin ingin menghapus ${judul} ?`) == true) {

                const id = $(this).attr("data-id");

                $.ajax({
                    type: "POST",
                    url: "{{ url('/admin/hapus-buku') }}/" + id,
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                    },
                    success: function(data) {
                        table.draw();
                    }
                });

            }
        });

        $('#table-buku tbody').on('click', 'td.details-control', function() {
            const tr = $(this).closest('tr');
            const row = table.row(tr);

            if (row.child.isShown()) {
                $('div.slider', row.child()).slideUp(function() {
                    row.child.hide();
                    tr.removeClass('shown');
                });
            } else {
                $.ajax({
                    url: "{{ url('/api/admin/data-buku') }}/" + row.data().id,
                    success: function(res) {
                        row.child(formatDetail(res), 'no-padding').show();
                        tr.addClass('shown');
                        $('div.slider', row.child()).slideDown();
                    }
                });
            }
        });

        formatDetail = (d) => {
            const buku = d.buku;
            const detail = d.detail;

            let table = `<table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tempat Terbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">No Induk</th>
                                <th scope="col">Inisial Buku</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>`;

            let no = 1;
            for (const v of detail) {
                console.log(v);
                table += `  <tr>
                                <th scope="row">${no}</th>
                                <td>${v.tempat_terbit}</td>
                                <td>${v.tahun_terbit}</td>
                                <td>${v.no_induk}</td>
                                <td>${v.inisial_buku}</td>
                                <td>${v.isbn}</td>
                                <td>
                                    <a href="/admin/edit-detail-buku/${v.id_detail}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <button class="btn btn-danger hapus-detail-buku" data-id="${v.id_detail}" data-no_induk="${v.no_induk}"><i class="bi bi-trash3"></i></button>
                                </td>
                                <td>
                                    <div class="${v.status==1 ? 'Ready' : 'Dipinjam'}">
                                    ${v.status==1 ?'Ready' : 'Dipinjam'}
                                    </div>
                                </td>
                            </tr>`;
                no++;
            }

            $('#table-buku tbody').on('click', 'td button.hapus-detail-buku ', function() {
                // console.log($(this).attr("data-judul"));
                const no_induk = $(this).attr("data-no_induk");
                if (confirm(`Yakin ingin menghapus ${no_induk} ?`) == true) {

                    const id = $(this).attr("data-id");

                    $.ajax({
                        type: "POST",
                        url: "{{ url('/admin/hapus-detail-buku') }}/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE',
                        },
                        success: function(data) {
                            location.reload()
                        }
                    });

                }
            });

            const slider = `
                            <div class="slider">
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Singkatan Pengarang</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.singkatan_pengarang}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Tempat Terbit</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.tempat_terbit}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Tahun Terbit</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.tahun_terbit}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Tahun Buku</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.tahun_buku}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>No klasifikasi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.no_klasifikasi}</p>   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Insial Buku</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>${buku.inisial_buku}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>ISBN</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>001-001-001-001-0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                ${table}`;

            return slider;

            table += `</tbody>
                      </table>
                      </div>`;

        }
    </script>
@endsection
