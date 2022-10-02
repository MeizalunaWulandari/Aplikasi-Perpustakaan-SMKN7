@extends('layout.template_admin')
@section('assets-top')
    <style type="text/css">
        #table-booking td.details-control {
            background: url("{{ asset('imgassets/produk-arrow.png') }}") no-repeat center center;
            background-size: 40px;
            cursor: pointer;
        }

        #table-booking tr.shown td.details-control {
            background: url("{{ asset('imgassets/produk-arrow2.png') }}") no-repeat center center;
            background-size: 40px;
        }

        div.slider {
            display: none;
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <!-- Modal Verifikasi -->
    <div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pengembalian Buku</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Judul Buku"
                                name="judul_buku" readonly>
                            <label for="floatingInput">Judul Buku</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="No Induk"
                                name="no_induk" readonly>
                            <label for="floatingInput">No Induk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Pengembalian"
                                name="tanggal_pengembalian" readonly>
                            <label for="floatingInput">Tanggal Pengembalian</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" placeholder="Tanggal Dikembalikan"
                                name="tanggal_dikembalikan" readonly>
                            <label for="floatingInput">Tanggal Dikembalikan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Terlambat (Hari)"
                                name="terlambat" readonly>
                            <label for="floatingInput">Terlambat (Hari)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Denda" name="denda"
                                readonly>
                            <label for="floatingInput">Denda</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-heading">
        <h3>Data Booking</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-between">
            {{-- <div class="d-sm-inline-block">
                <div class="form-group">
                    <label for="filter">Filter</label>
                    <select name="filter_status" id="filter" class="form-control" required>
                        <option value="1">Unverified</option>
                        <option value="2">Verified</option>
                        <option value="3">Due date</option>
                    </select>
                </div>
            </div> --}}
            {{-- </div> --}}
            {{-- <div class="d-sm-flex align-items-center justify-content-end"> --}}
            <div class="d-sm-inline-block">
                <a href="#" class="btn btn-primary">Export</a>
            </div>
        </div>
        <br><br>
        <div class="datatable">
            <table id="table-booking" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN Peminjam Buku</th>
                        <th>Nama Peminjam Buku</th>
                        <th>Nomor Telpon Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        {{-- <th>Tanggal Pengembalian</th> --}}
                        {{-- <th>Keterlambatan (hari)</th> --}}
                        {{-- <th>Denda</th> --}}
                        <th>Detail</th>
                        {{-- <th>Detail</th> --}}
                    </tr>
                </thead>
                <tbody id="nampel">
                    <?php // $no = 1;
                    ?>
                    {{-- @foreach ($booking as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama }}</td>
                <td><a href="https://wa.me/{{ $item->notelp }}" target="_break" title="Hubungi {{ $item->nama }}">{{ $item->notelp }}</a></td>
                <td>{{ $item->judul_buku }}</td>
                <td>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    </div>
                </td>
                </tr>
                @endforeach --}}
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NISN Peminjam Buku</th>
                        <th>Nama Peminjam Buku</th>
                        <th>Nomor Telpon Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        {{-- <th>Tanggal Pengembalian</th> --}}
                        {{-- <th>Keterlambatan (hari)</th> --}}
                        {{-- <th>Denda</th> --}}
                        <th>Detail</th>
                        {{-- <th>Detail</th> --}}
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const table = $('#table-booking').DataTable({
            dom: '<lf<t>ip>',
            // pageLength: 10,
            // bLengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.admin.bookingReturned') }}",
                data: function(d) {
                    // d.status = $('select[name=filter_status]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nisn',
                    name: 'nisn'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'notelp',
                    name: 'notelp'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                // {
                //     data: 'status',
                //     name: 'status'
                // },
                {
                    data: 'tanggal_peminjaman',
                    name: 'tanggal_peminjaman'
                },
                // {
                //     data: 'tanggal_pengembalian',
                //     name: 'tanggal_pengembalian'
                // },
                // {
                //     data: 'terlambat',
                //     name: 'terlambat'
                // },
                // {
                //     data: 'denda',
                //     name: 'denda'
                // },
                {
                    className: 'details-control',
                    data: 'null',
                    defaultContent: ''
                }
            ],
            // columnDefs: [{
            //         render: function(data, type, row, meta) {
            //             const html = `${row.terlambat} Hari`;

            //             return html;
            //         },
            //         targets: [7]
            //     },
            //     {
            //         render: function(data, type, row, meta) {
            //             const html = `Rp ${row.denda},- `;

            //             return html;
            //         },
            //         targets: [8]
            //     },
            // ],
            order: [],
            language: {
                search: "",
                searchPlaceholder: "Search"
            }
        });

        $('#table-booking tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                $('div.slider', row.child()).slideUp(function() {
                    row.child.hide();
                    tr.removeClass('shown');
                });
            } else {
                $.ajax({
                    url: "{{ url('/api/admin/bookingReturned-detail') }}/" + row.data().nisn,
                    success: function(res) {
                        row.child(formatDetail(res), 'no-padding').show();
                        tr.addClass('shown');
                        $('div.slider', row.child()).slideDown();
                    }
                });
            }
        });

        // $('#filter').change(function() {
        //     table.draw();
        // });

        formatDetail = (d) => {
            let table = `<table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Keterlambatan (Hari)</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Tanggal Dikembalikan</th>
                                <th scope="col">No Induk Buku</th>
                                </tr>
                            </thead>
                            <tbody>`;

            let no = 1;
            for (const v of d.booking) {
                table += `  <tr>
                                <th scope="row">${no}</th>
                                <td>${v.tanggal_pengembalian}</td>
                                <td>${v.terlambat} Hari</td>
                                <td>Rp ${v.denda},-</td>
                                <td>${v.tanggal_dikembalikan}</td>
                                <td>${v.no_induk}</td>
                            </tr>`;
                no++;
            }

            const slider = `
                            <div class="slider">
                                ${table}`;

            return slider;
            table += `</tbody>
                      </table>
                      </div>`;
        }
    </script>
@endsection
