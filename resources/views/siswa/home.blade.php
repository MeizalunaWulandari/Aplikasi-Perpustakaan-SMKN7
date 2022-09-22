@extends('layout.template_siswa')
@section('content')
    <header>
        <div class="jumbotron" id="change-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg text-intro">
                        <h1 class="yellow">E - Library</h1>
                        <h3>SMK Negeri 7 Samarinda</h3>
                        {{-- <form action="{{ url('search-book') }}" method="post">
                            @csrf
                            <div class="mb-3 d-flex search-book">
                                <span class="icon-search d-flex">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari buku disini" / name="book">
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form> --}}
                    </div>
                    {{-- <div class="col-lg">
                        <img src="{{ asset('storage/header.png') }}" alt="" />
                    </div> --}}
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
                        <a class="link-blue" href="{{ url('katalog') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                    </h5>
                </div>
            </div>
            <div class="owl-carousel section-two owl-theme">
                @foreach ($bukuFisik as $item)
                    <div class="grid-item">
                        <div class="book">
                            <a href="{{ url('book-detail/' . $item->slug_buku) }}">
                                <div class="card ">
                                    <span class="cover">
                                        <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted blue">Availble Book <b>{{ $item->stock }}</b></p>
                                        <p class="card-text small muted yellow fw-bold">{{ $item->penerbit }}</p>
                                        <span class="jenis-buku small">{{ $item->jenis_buku }}</span>
                                        <p>{{ $item->judul }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
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
                        <a class="link-blue" href="{{ url('katalog') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                    </h5>
                </div>
            </div>
            <div class="owl-carousel section-two owl-theme">
                @foreach ($bukuDigital as $item)
                    <div class="grid-item">
                        <div class="book">
                            <a href="{{ url('book-detail/' . $item->slug_buku) }}">
                                <div class="card ">
                                    <span class="cover">
                                        <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted blue">Availble Book <b>{{ $item->stock }}</b></p>
                                        <p class="card-text small muted yellow fw-bold">{{ $item->penerbit }}</p>
                                        <span class="jenis-buku small">{{ $item->jenis_buku }}</span>
                                        <p>{{ $item->judul }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="kurikulum">
        <div class="container">
            <h4>Akses Buku Lebih Mudah</h4>
            <hr class="bg-yellow">
            <div class="row">
                @foreach ($kategoriLoop as $item)
                    <div class="col-lg mb-3">
                        {{-- <div
                            class="card d-flex align-items-center <?= Request::url() == url('katalog/' . $item->slug) ? 'active' : '' ?> shadow">
                            <img src="{{ url('imgassets/buku.png') }}" alt="">
                            <span>
                                <p>{{ $item->name }}</p>
                                <a  href="{{ url('katalog/' . $item->slug) }}">Lihat Selengkapnya</a>
                            </span>
                        </div> --}}
                        <a href="{{ url('katalog/' . $item->slug) }}">
                            <div
                                class="card align-items-center <?= Request::url() == url('katalog/' . $item->slug) ? 'active' : '' ?> shadow">
                                <img src="{{ url('imgassets/buku.png') }}" alt="">
                                <span>
                                    <p>{{ $item->name }}</p>
                                    <p>Lihat Selengkapnya</p>
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <h2>Buku <span class="yellow">Nonteks</span></h2>
                </div>
                <div>
                    <h5>
                        <a class="link-blue" href="{{ url('katalog') }}">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                    </h5>
                </div>
            </div>
            <div class="owl-carousel section-two owl-theme">
                @foreach ($bukuNonteks as $item)
                    <div class="grid-item">
                        <div class="book">
                            <a href="{{ url('book-detail/' . $item->slug_buku) }}">
                                <div class="card ">
                                    <span class="cover">
                                        <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted blue">Availble Book <b>{{ $item->stock }}</b></p>
                                        <p class="card-text small muted yellow fw-bold">{{ $item->penerbit }}</p>
                                        <span class="jenis-buku small">{{ $item->jenis_buku }}</span>
                                        <p>{{ $item->judul }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{-- @dd($countTelahDibaca->total_count) --}}
    <script>
        const options = {
            duration: 50,
            startVal: 1,
        };
        let read = new CountUp('readCount', {{ $countTelahDibaca->total_count }}, options);
        if (!read.error) {
            read.start();
        } else {
            console.error(read.error);
        }

        let book = new CountUp('bookCount', {{ $countBukuTersedia->total_count }}, options);
        if (!book.error) {
            book.start();
        } else {
            console.error(book.error);
        }

        let visit = new CountUp('visitCount', {{ $countTotalKunjungan->total_count }}, options);
        if (!visit.error) {
            visit.start();
        } else {
            console.error(visit.error);
        }
    </script>
@endsection
