@extends('layout.template_siswa')

@section('content')
    <section>
        <div class="container detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('katalog') }}">Katalog</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ url('katalog/' . $buku->slug_kategori) }}">{{ $buku->nama_kategori }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $buku->judul }}</li>
                </ol>
            </nav>
            <div class="detail-wrapper">
                <div class="detail-card">
                    <div class="detail-img" id="detail-img">
                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="">
                    </div>

                    <div class="detail-info mt-3">
                        <div class="detail-header">
                            <h5 class="title">{{ $buku->judul }}</h5>
                            <p class="muted">{{ $buku->jenis_buku }}</p>
                            @if ($buku->jenis_buku != 'Fisik')
                                <a href="{{ url('download-ebook/' . $buku->id_buku) }}">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Download
                                    </button>
                                </a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#read-book"><i class="bi bi-book"></i> Baca Online</button>
                                <!-- Modal -->
                                <div class="modal fade" id="read-book" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-center">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ $buku->judul }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <object data="{{ asset('storage/buku-digital/' . $buku->file_pdf) }}"
                                                    type="application/pdf" style="width: 100%; height: 80vh;">
                                                    <embed src="{{ asset('storage/buku-digital/' . $buku->file_pdf) }}"
                                                        type="application/pdf">
                                                </object>
                                                <div class="pdfjs-viewer">
                                                    <div class="viewer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Auth::guard('websiswa')->check() == false)
                                    <a href="{{ url('login') }}">
                                        <button class="btn btn-primary mt-3">Masuk Untuk Meminjam buku</button>
                                    </a>
                                @else
                                    <a href="#">
                                        <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                            data-bs-target="#notelp"><i class="bi bi-file-earmark-plus"></i>
                                            Pinjam Buku</button>
                                    </a>
                                    <div class="modal fade" id="notelp" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor Telepon
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('booking') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $buku->id_buku }}">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Nomor
                                                                Telepon</label>
                                                            <input type="number" class="form-control"
                                                                id="exampleFormControlInput1" placeholder="628**********"
                                                                name="notelp" value="628">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Booking Now</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="muted mt-3">Availble Stock <b>{{ $buku->stock }}</b></p>
                                @endif
                            @endif
                            <!-- Modal -->
                        </div>

                        <p class="muted">Telah dibaca 1.000 kali</p>

                        <div class="row align-items-center mb3">
                            <div class="col-6 col-lg-2">
                                <span>Detail Buku</span>
                            </div>
                            <div class="col-6 col-lg-2">
                                <hr>
                            </div>
                        </div>
                        @if ($buku->jenis_buku != 'Fisik')
                            <div class="row pdf-statistic mt-3">
                                <div class="col-lg-3">
                                    <p>Penerbit</p>
                                    <p>{{ $buku->penerbit }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Penulis</p>
                                    <p>{{ $buku->pengarang }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Tahun Buku</p>
                                    <p>{{ $buku->tahun_buku }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>ISBN</p>
                                    <p>{{ $buku->isbn }}</p>
                                </div>
                            </div>
                        @else
                            <div class="row pdf-statistic mt-3">
                                <div class="col-lg-3">
                                    <p>Penerbit</p>
                                    <p>{{ $buku->penerbit }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Pengarang</p>
                                    <p>{{ $buku->pengarang }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Edisi</p>
                                    <p>{{ $buku->tahun_buku }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <p>Tahun Terbit</p>
                                    <p>{{ $buku->tahun_terbit }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        var pdfViewer = new PDFjsViewer($('.viewer'));
        pdfViewer.loadDocument('{{ asset('storage/buku-digital/' . $buku->file_pdf) }}');
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
    </script>
@endsection
