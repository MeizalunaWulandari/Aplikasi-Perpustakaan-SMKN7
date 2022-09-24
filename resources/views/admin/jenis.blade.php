@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Jenis Buku</h3><br><br>
        <div>
            <a href="{{ url('admin/tambah-jenis-buku') }}" class="btn btn-primary">Add</a>
        </div><br><br>
    </div>
    <div class="page-body">
        <div class="datatable">
            <table id="table-jenis" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
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

@section('script')
    <script>
        const table = $('#table-jenis').DataTable({
            dom: '<lf<t>ip>',
            // pageLength: 10,
            // bLengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.admin.jenis-buku') }}",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    className: 'actions-control',
                    data: 'null',
                    defaultContent: '<a href="/admin/tambah-detail-buku/2" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i></a> <a href="/admin/edit-buku/2" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>'
                }
            ],
            columnDefs: [{
                render: function(data, type, row, meta) {

                    const html =
                        `<a href="/admin/edit-jenis-buku/${row.id}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>` +
                        `<button class="btn btn-danger hapus-jenis-buku" data-id="${row.id}" data-keterangan="${row.keterangan}"><i class="bi bi-trash3"></i></button>`;

                    return html;
                },
                targets: [2]
            }, ],
            order: [],
            language: {
                search: "",
                searchPlaceholder: "Search"
            }
        });

        $('#table-jenis tbody').on('click', 'td button.hapus-jenis-buku ', function() {
            // console.log($(this).attr("data-judul"));
            const keterangan = $(this).attr("data-keterangan");
            if (confirm(`Yakin ingin menghapus jenis buku ${keterangan} ?`) == true) {

                const id = $(this).attr("data-id");

                $.ajax({
                    type: "POST",
                    url: "{{ url('/admin/hapus-jenis-buku') }}/" + id,
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                    },
                    success: function(data) {
                        table.draw()
                    }
                });

            }
        });
    </script>
@endsection
