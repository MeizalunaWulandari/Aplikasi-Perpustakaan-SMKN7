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

        /* table.dataTable tbody tr {
            background-color: unset !important;
        } */

        div.slider {
            display: none;
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="page-heading">
        <h3>Data Booking</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="d-sm-inline-block">
                <div class="form-group">
                    <label for="filter">Filter</label>
                    <select name="filter_status" id="filter" class="form-control" required>
                        <option value="1">Unverified</option>
                        <option value="2">Verified</option>
                        <option value="3">Due date</option>
                    </select>
                </div>
            </div>
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
                        <th>Verifikasi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody id="nampel">
                    <?php $no = 1; ?>
                    @foreach ($booking as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><a href="https://wa.me/{{ $item->notelp }}" target="_break"
                                    title="Hubungi {{ $item->nama }}">{{ $item->notelp }}</a></td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NISN Peminjam Buku</th>
                        <th>Nama Peminjam Buku</th>
                        <th>Nomor Telpon Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Verifikasi</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var table = $('#table-booking').DataTable({
            dom: '<lf<t>ip>',
            // pageLength: 10,
            // bLengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.admin.booking') }}",
                data: function(d) {
                    d.status = $('select[name=filter_status]').val();
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
                    data: 'buku_id',
                    name: 'buku_id'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    className: 'details-control',
                    data: 'null',
                    defaultContent: ''
                }
            ],
            columnDefs: [{
                render: function(data, type, row, meta) {
                    const checked = row.status == 2 ? 'checked' : '';

                    const html = `<div class="form-check form-switch">
                                <input name="status" class="form-check-input" type="checkbox" role="switch" value="${row.id}" ${checked}>
                            </div>`;

                    return html;
                },
                targets: [5]
            }, ],
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
                row.child(formatDetail(row.data()), 'no-padding').show();
                tr.addClass('shown');
                $('div.slider', row.child()).slideDown();
            }
        });

        $('#filter').change(function() {
            table.draw();
        });

        $('#table-booking tbody').on('change', 'td input[name=status]', function() {

            if (confirm("Apakah Anda yakin ingin mengubah status ini?") == true) {

                const status = $(this).is(':checked') ? 2 : 1;
                const id = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('/admin/booking/status') }}/" + id,
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'PUT',
                        status: status,
                    },
                    success: function(data) {
                        // table.draw();
                    }
                });

            } else {
                const returnVal = $(this).is(':checked') ? false : true;
                $(this).prop("checked", returnVal);
            }
        });

        function formatDetail(d) {

            const slider = `<div class="slider">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        </tr>
                    </tbody>
                    </table>
                </div>`;

            return slider;
        }
    </script>
@endsection
