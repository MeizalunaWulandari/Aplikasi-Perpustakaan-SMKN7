@extends('layout.template_admin')
@section('content')
    <div class="page-heading">
        <h3>Data Booking</h3><br><br>
        <div class="d-sm-flex align-items-center justify-content-start">
            <div class="d-sm-inline-block">
                <div class="form-group mb-3">
                    <label for="namgur">Nama Mapel</label>
                    <select name="txtMapel" id="namgur" class="form-control" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-sm-flex align-items-center justify-content-end">
            <div class="d-sm-inline-block">
                <a href="#" class="btn btn-primary">Export</a>
            </div>
        </div>
        <br><br>
        <div class="datatable">
            <table id="example" class="table table-striped" style="width:100%">
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
                                <form action="#" method="post">
                                    @csrf
                                    <button type="submit" class="status red {{ $item->status == '1' ? 'active' : '' }}"
                                        value="1" name="status" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Set status to : Unverified"></button>
                                    <button type="submit" class="status green {{ $item->status == '2' ? 'active' : '' }}"
                                        value="2" name="status" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Set status to : Verified"></button>
                                </form>
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
    <script type=text/javascript>
        $('#namgur').change(function() {

            var guruId = $(this).val();

            if (guruId) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/getMapel') }}",
                    data: {
                        id: guruId
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        if (res) {

                            console.log(res);

                            $("#nampel").empty();
                            // $("#nampel").append('<option value="">Pilih Mapel</option>');
                            $.each(data, function(key, value) {
                                $("#nampel").append('<option value="' + value.id + '">' +
                                    value.name +
                                    '</option>');
                            });

                        } else {

                            $("#nampel").empty();
                        }
                    }
                });
            } else {

                $("#nampel").empty();
            }
        });
    </script>
@endsection
