@extends('layout.template_siswa')
@section('content')
    <header>
        <div class="jumbotron" id="change-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg text-intro">
                        <h1 class="yellow">E - Library</h1>
                        <h5>SMK Negeri 7 Samarinda</h5>
                        <form action="">
                            <div class="mb-3 d-flex search-book">
                                <span class="icon-search d-flex">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari buku disini" />
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Kurikulum Merdeka</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg">
                        <img src="{{ asset('imgassets/header.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="count-wrapper">
        <div class="count-view">
            <div class="row">
                <div class="col count-read">
                    <h6 class="text-read ">Buku Telah dibaca</h6>
                    <h3 class="yellow fw-bold" id="readCount"></h3>
                    <i class="fs-4 fw-bold text-center bi bi-book"></i>
                </div>
                <div class="col count-visit">
                    <h6 class="text-visit ">Total Kunjungan</h6>
                    <h3 class="yellow fw-bold" id="visitCount"></h3>
                    <i class="fs-4 fw-bold text-center bi bi-people-fill  "></i>
                </div>
                <div class="col count-book">
                    <h6 class="text-book ">Buku Tersedia</h6>
                    <h3 class="yellow fw-bold" id="bookCount"></h3>
                    <i class="fs-4 fw-bold text-center bi bi-journal-check"></i>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h2>Buku <span class="yellow">Fisik</span></h2>
                </div>
                <div>
                    <h5>
                        <a class="link-blue" href="{{ url('all-book') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                    </h5>
                </div>
            </div>
            <div class="owl-carousel section-two owl-theme">
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card ">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">Fisik</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">Fisik</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card shadow">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">Fisik</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">Fisik</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="daftar-login">
        <div class="container">
            <h3>Ayo Baca Buku di Perpustakaan</h3>
            <hr class="bg-yellow">
            <p>Login untuk meminjam dan mendaftar menjadi anggota perpustakaan SMK Negeri 7 Samarinda menggunakan NISN
            </p>
            <p>Baca panduan meminjam buku <a href="#" class="link-yellow">disini</a></p>
            <a href="{{ url('login') }}" class="btn btn-primary">Login Siswa</a>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h2>Buku <span class="yellow">Digital</span></h2>
                </div>
                <div>
                    <h5>
                        <a class="link-blue" href="{{ url('all-book') }}">Lihat Semua <i
                                class="bi bi-arrow-right"></i></a>
                    </h5>
                </div>
            </div>
            <div class="owl-carousel section-two owl-theme">
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card ">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card shadow">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid-item">
                    <div class="book">
                        <a href="{{ url('book-detail') }}">
                            <div class="card">
                                <span class="cover">
                                    <img src="{{ asset('imgassets/coverbook.png') }}" alt="">
                                </span>
                                <div class="description">
                                    <p class="card-text small muted blue">Availble Book <b>20</b></p>
                                    <p class="card-text small muted yellow fw-bold">Airlangga</p>
                                    <span class="jenis-buku small">PDF</span>
                                    <p>Pendidikan Agama Katholik Dan Budi Pekerti Untuk SMA/SMK Kelas X</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
