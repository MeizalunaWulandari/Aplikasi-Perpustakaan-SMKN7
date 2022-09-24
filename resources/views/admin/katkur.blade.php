@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Kategori - Kurikulum Buku</h3><br><br>
        <div>
            <a href="{{ url('admin/tambah-katkur') }}" class="btn btn-primary">Add</a>
            <div class="d-sm-inline-block">
                <div class="form-group">
                    <label for="filter">Filter </label>
                    <select name="filter_katkur" id="filter" class="form-control" required>
                        <option value="">Filter</option>
                        <option value="1">Kategori</option>
                        <option value="2">Kurikulum</option>
                    </select>
                </div>
            </div>
        </div><br><br>
    </div>
    <div class="page-body">
        <div class="datatable">
            <table id="table-katkur" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const table = $('#table-katkur').DataTable({
            dom: '<lf<t>ip>',
            // pageLength: 10,
            // bLengthChange: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.admin.katkur') }}",
                data: function(d) {
                    d.katkur = $('select[name=filter_katkur]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                // {
                //     data: 'type',
                //     name: 'type'
                // },
                {
                    className: 'actions-control',
                    data: 'null',
                    defaultContent: '<a href="/admin/tambah-detail-buku/2" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i></a> <a href="/admin/edit-buku/2" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>'
                }
            ],
            columnDefs: [{
                render: function(data, type, row, meta) {

                    const html =
                        `<a href="/admin/edit-katkur/${row.id}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>` +
                        `<button class="btn btn-danger hapus-katkur" data-id="${row.id}" data-katkur="${row.name}"><i class="bi bi-trash3"></i></button>`;

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

        $('#filter').change(function() {
            table.draw();
        });

        $('#table-katkur tbody').on('click', 'td button.hapus-katkur ', function() {
            // console.log($(this).attr("data-katkur"));
            const katkur = $(this).attr("data-katkur");
            if (confirm(`Yakin ingin menghapus ${katkur} ?`) == true) {

                const id = $(this).attr("data-id");

                $.ajax({
                    type: "POST",
                    url: "{{ url('/admin/hapus-katkur') }}/" + id,
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
