@extends('layout.template_siswa')

@section('content')
<section class="history-section">
    <div class="container booking-list">
        <h3>Booking-list</h3>
        <div class="card booking-info">
                <form action="" class="help-bar">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input class="form-control" type="text" placeholder="Cari buku mu disini" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input class="form-control" type="text" placeholder="Cari buku mu disini" />
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">Kurikulum Merdeka</option>
                        <option value="1">Kurikulum Merdeka</option>
                        <option value="1">Kurikulum Merdeka</option>
                    </select>
                </form>
            <div class="status">
                <p>Status</p>
                <ul>
                    <li><a href="#">Verified</a></li>
                    <li><a href="#">Unverified</a></li>
                    <li><a href="#">due date</a></li>
                    <li><a href="#">returned</a></li>
                </ul>
            </div>
            <div class="list-book">
                <span>
                    <p><i class="bi bi-journal-bookmark-fill"></i> Jenis Buku</p>
                    <p class="date"> 7 september 2006 </p>
                </span>
                <div class="info-book">                       
                    <span class="cover">
                        <img src="./assets/coverbook.png" alt="">
                    </span>
                    <div class="description">
                        <p class="card-text small muted yellow fw-bold">Airlangga</p>
                        <span class="jenis-buku small">Fisik</span>
                        <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                    </div>
                </div>
                <div class="lending-detail">
                    <button class="btn btn-primary">Pinjam Lagi</button>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#reBooking" ><p>Lihat Detail Peminjaman</p> </a>
                </div>   
            </div>
            <div class="modal fade" id="reBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-center modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><span class="yellow">Panduan </span>Meminjam Buku
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1>modal</h1>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                             <button type="button" class="btn btn-primary"></button>
                        </div> -->
                    </div>
                </div>
        </div>
    </div>
    </div>
</section>
    
@endsection