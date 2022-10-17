<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Library</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('mycss/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('mycss/component.css') }}" />
    <link rel="shortcut icon" href="{{ asset('imgassets/logo1.jpeg') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css"
        integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!-- Bootstrap CSS -->

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&family=Nunito&display=swap"
        rel="stylesheet">
    <!-- Google Font -->

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <!-- Owl Carousel -->

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JQuery -->

    <!-- Plugin PDF Viewer -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
        <script src="{{ asset('myjs/pdfjs-viewer.js') }}"></script>
        <!-- <link rel="stylesheet" href="./assets/web-pdf-viewer/css/pdfjs-viewer.css"> -->
    <!-- Plugin PDF Viewer -->
</head>

<body>
    <div id="loader-wrapper">
        <div class="loader"></div>
    </div>
    <nav class="nav-container bottom shadow-lg">
        <div class="nav-menu">
            <ul class="nav-list">
                <li class="nav-item <?= Request::url() == url('/') ? 'active' : '' ?>">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="bi bi-house nav-icon"></i>
                        <span class="nav-name">
                            Home
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('katalog') }}" class="nav-link">
                        <i class="bi bi-view-list nav-icon"></i>
                        <span class="nav-name">
                            Katalog
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="##" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-patch-question nav-icon"></i>
                        <span class="nav-name">
                            Panduan
                        </span>
                    </a>
                </li>
                @if (Auth::guard('websiswa')->check() == false)
                    <li class="nav-item">
                        <a href="{{ url('login') }}" class="nav-link">
                            <i class="bi bi-box-arrow-in-right nav-icon"></i>
                            <span class="nav-name">
                                Login
                            </span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('logout') }}" class="nav-link">
                            <i class="bi bi-box-arrow-left"></i>
                            <span class="nav-name">
                                Logout
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <nav class="navbar fixed-top" id="navbar">
        <ul class="container">
            <div class="left">
                <li class="navbar-logo" id="navbar-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('imgassets/e-lib-logo-notitle-nobg.png') }}" alt="">
                    </a>
                </li>
                <li class="navbar-list <?= Request::is('/') ? 'active' : '' ?>">
                    <a href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="navbar-list <?= Request::is('katalog/*') ? 'active' : Request::is('book-detail/*') ? 'active' : '' ?>">
                    <a href="{{ url('katalog') }}">Katalog</a>
                </li>
                <li class="navbar-list">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Panduan</i>
                    </a>
                </li>
            </div>
            <div class="right">
                @if (Auth::guard('websiswa')->check() == false)
                <li class="navbar-list">
                    <a href="{{ url('login') }}" class="link">Login</a>
                </li>
                @else
                <li class="navbar-list">
                    <a href="{{ url('logout') }}" class="link">Logout</a>
                </li> @endif
            </div>
        </ul>
    </nav>
    <!-- Modal -->
    <div class="modal
        fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-center modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="yellow">Panduan </span>Meminjam Buku
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bagaimana <span class="yellow">Cara Meminjam Buku</span> Di Perpustakaan SMK Negeri 7 Samarinda?
                </p>
                <ol>
                    <li>Login akun menggunakkan NISN Anda</li>
                    <li>Buka detail buku fisik yang ingin Anda pinjam</li>
                    <li>Klik pinjam buku dan masukkan nomor telepon Anda, lalu klik <b class="yellow">Booking
                            Now</b></li>
                    <li>Setelah membooking buku, silahkan datang ke perpustakaan sekolah, dan konfirmasi ke petugas
                        perpustakaan untuk memverifikasi-nya</li>
                    <li>Batas waktu peminjaman buku adalah <b class="yellow">1 Minggu</b> mulai dari petugas
                        memverifikasi</li>
                    <li>Anda akan dihubungi oleh petugas jika batas waktu yang ditentukan sudah melewati batas, dan
                        akan dikenakan denda oleh petugas perpustakaan</li>
                    <li>Jika ada kendala teknis, silahkan hubungi operator yang bertugas</li>
                </ol>
            </div>
            <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary"></button>
                </div> -->
        </div>
    </div>
    </div>
    @if (session('status'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#007aff"></rect>
                    </svg>
                    <strong class="me-auto">Notification</strong>
                    <small>Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    {{-- Content --}}
    @yield('content')
    {{-- Content --}}
    <footer>
        <div class="footer-grid">
            <div class="footer-grid-item">
                <div class="footer-logo">
                    <img src="{{ asset('imgassets/e-lib-logo-title-right-nobg.png') }}" alt="">
                </div>
            </div>
            <div class="footer-grid-item footer-link">
                <ul>
                    <li>
                        <h5>LINK TERKAIT</h5>
                    </li>
                    <li><a href="https://smkn7-smr.sch.id/">SMK NEGERI 7 SAMARINDA</a></li>
                    <li><a href="https://buku.kemdikbud.go.id/">SISTEM INFORMASI PERBUKUAN INDONESIA</a></li>
                    <li><a href="https://www.kemdikbud.go.id/">KEMDIKBUDRISTEK</a>
                    </li>
                    <li><a href="https://web.disdikbud.kaltimprov.go.id/">DINAS PENDIDIKAN PROVINSI KALIMANTAN
                            TIMUR</a>
                    </li>
                    <li><a href="https://disdik.samarindakota.go.id/">DINAS PENDIDIKAN KOTA SAMARINDA</a></li>
                    <li><a href="https://nisn.data.kemdikbud.go.id/">NOMOR INDUK SISWA NASIONAL</a></li>
                </ul>
            </div>
            <div class="col-lg footer-link">
                <ul>
                    <li>
                        <h5>APLIKASI TERKAIT</h5>
                    </li>
                    <li><a href="https://cabdinsamarinda.siap-ppdb.com/">PPDB ONLINE</a></li>
                    <li><a href="https://siswa.smkn7-smr.sch.id/">PORTAL AKADEMIK SISWA</a></li>
                    <li><a href="https://lulus.smkn7-smr.sch.id/">KELULUSAN UJIAN NASIONAL</a></li>
                    <li><a href="https://surat.smkn7-smr.sch.id/pengajuan">PENGAJUAN SURAT SISWA</a></li>
                    <li><a href="https://siapel.smkn7-smr.sch.id/">SISTEM PELAYANAN SISWA BARU</a></li>
                    <li><a href="https://siapel.smkn7-smr.sch.id/"></a></li>
                    <li><a href="https://bkk.smkn7-smr.sch.id/">DATA ALUMNI</a></li>
                    <li><a href="#">E-LIBRARY SMK 7</a></li>
                </ul>
            </div>
            <div class="col-lg footer-link">
                <ul>
                    <li>
                        <h5>MEDIA SOSIAL</h5>
                    </li>
                    <li><a href="https://www.instagram.com/smkn7_smr">INSTAGRAM</a></li>
                    <li><a href="https://www.facebook.com/smkn7smr/">FACEBOOK</a></li>
                    <li><a href="https://www.youtube.com/c/SMKN7SamarindaTV">YOUTUBE</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>
            Copyright <a href="https://pplg2021.smkn7-smr.sch.id" class="link">PPLG 2021</a> | ALL RIGHTS RESERVED
            &copy;
        </p>
    </div>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('myjs/sidebar.js') }}"></script>
    <script src="{{ asset('myjs/countUp.js') }}"></script>

    {{-- Navigation --}}
    <script>
        $(document).ready(function() {
            $(".icon-bar").click(function() {
                $(this).toggleClass('openbar');
                $('.nav-menu').toggleClass('show-nav');
                $('.navbar-right').toggleClass('show-right');
                $('.navbar-left').toggleClass('show-left');

                console.log(1)
            });
        });


        window.onscroll = function() {
            scrollFunction()
        };
        if (window.location.href == 'https://e-library.stevanandreas.com/') {
            function scrollFunction() {
                if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                    document.getElementById("navbar").classList.add("scroll")
                    document.getElementById("navbar").classList.add("shadow-sm")
                    document.getElementById("sidebar-burger").classList.add("scroll")
                    document.getElementById("sidebar-burger").classList.add("shadow-sm")
                    document.getElementById("navbar-logo").innerHTML =
                        '<a href="{{ url('/') }}"><img src="{{ asset('imgassets/e-lib-logo-notitle-nobg.png') }}" alt="">'
                } else {
                    document.getElementById("navbar").classList.remove("scroll")
                    document.getElementById("navbar").classList.remove("shadow-sm")
                    document.getElementById("sidebar-burger").classList.remove("scroll")
                    document.getElementById("sidebar-burger").classList.remove("shadow-sm")
                    document.getElementById("navbar-logo").innerHTML =
                        '<a href="{{ url('/') }}"><img src="{{ asset('imgassets/e-lib-logo-notitle-nobg.png') }}" alt="">'
                }
            }
        } else {
            document.getElementById("navbar").classList.add("scroll")
            document.getElementById("navbar").classList.add("shadow-sm")
        }
    </script>

    <!-- Owl Carousel -->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('myjs/owl-carousel.js') }}"></script>

    {{-- Toast --}}
    @if (session('status'))
    <script>
        $(document).ready(function() {
            // $("#liveToastBtn").click(function() {
            $("#liveToast").toast("show");
            // });
        });
    </script> @endif
    @yield('script')
    </body>

    {{-- Pdfjs --}}
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.10.377/build/pdf.min.js"></script>

</html>
