@extends('layout.template_siswa')

@section('content')
    <section>
        <div class="container detail" onclick="closeSidebar()">
            <div class="navigation"><a href="{{ url('/') }}">Beranda</a> / <a href="#">Kurikulum Merdeka</a> /
                Pendidikan Agama Katolik dan Budi pekerti Untuk SMA/SMK Kelas X</div>
            <div class="row">
                <div class="col-sm detail-book">
                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">

                </div>
                <div class="col-lg book-description">
                    <h3>Pendidikan Agama Katolik dan Budi Pekerti Untuk SMA/SMK Kelas X</h3>
                    <p class="small muted">Availble Book <b>20</b></p>
                    <a href="{{ url('login') }}">
                        <button class="btn btn-primary mt-3">Masuk Untuk Meminjam buku</button>
                    </a>
                    <a href="#">
                        <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Pinjam Buku</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Booking Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    placeholder="628xxxxxxxxxx" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
