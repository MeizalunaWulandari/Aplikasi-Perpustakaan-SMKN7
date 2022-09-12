@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Data Booking</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-between">
            <div class="d-sm-inline-block">
                <div class="form-group">
                    <label for="filter">Filter</label>
                    <select name="status" id="filter" class="form-control" required>
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
                            <td>{{ $item->buku_id }}</td>
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
                    d.status = $('select[name=status]').val();
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
            ],
            columnDefs: [{
                render: function(data, type, row, meta) {
                    html = `<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
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
        $('#filter').change(function() {
            table.draw();
        });
    </script>
@endsection
