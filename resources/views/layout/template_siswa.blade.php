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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css"
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
</head>

<body>
    <div class="sidebar-burger" id="sidebar-burger">
        <div class="hamburger" id="openSideBar" onclick="sideBar()">
            <i class="bi bi-list"></i>
        </div>
        <!-- <div class="sidebar-title"> -->
        <img src="{{ asset('imgassets/logo1.png') }}" alt="">
        <!-- </div> -->
        <!-- <div class="sidebar-title"> E-Library </div> -->
    </div>
    <nav id="sidebar">
        <div class="close" onclick="closeSidebar()"></div>
        <div class="sidebar shadow-lg">
            <div class="container">
                <span id="close-sidebar" onclick="closeSidebar()">
                    <i class="bi bi-x-lg"></i>
                </span>
                <ul>
                    <li>
                        <a href="{{ url('/') }}" class="navbar-logo"><img src="{{ asset('imgassets/Logo perpus-3 cut.png') }}" alt=""></a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}" class="navbar-item">Beranda</a>
                    </li>
                    <li>
                        <a href="##" class="navbar-item" onclick="buttonDropSidebar()">
                            Kategori <span class="bi bi-caret-down"></span>
                        </a>
                        <div id="menuSidebar">
                            <ul>
                                <li><a href="#">Kurikulum Merdeka</a></li>
                                <li><a href="#">Kurikulum K13</a></li>
                                <li><a href="#">Nonteks</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('login') }}" class="navbar-item">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar fixed-top" id="navbar">
        <ul class="container">
            <div class="left">
                <li class="navbar-logo" id="navbar-logo">
                    <a href="{{ url('/') }}">
                        @if (Request::url() != url('/'))
                        <img src="{{ asset('imgassets/Logo perpus-3 cut.png') }}" alt="">
                        @else 
                        <img src="{{ asset('imgassets/logo1.png') }}" alt=""> @endif
                    </a>
                </li>
                <li class="navbar-list">
    <a href="{{ url('/') }}">Beranda</a>
    </li>
    <li class="navbar-list">
        <a href="##" id="dropbtn" onclick="dropbtn()">Kurikulum
            <i class="bi bi-caret-down"></i>
        </a>
        <div id="drop-content">
            <a href="#">Kurikulum Merdeka</a>
            <a href="#">Kurikulum K13</a>
            <a href="#">Nonteks</a>
        </div>
    </li>
    </div>
    <div class="right">
        <li class="navbar-list">
            <a href="{{ url('login') }}" class="link">Masuk</a>
        </li>
    </div>
    </ul>
    </nav>
    {{-- Content --}}
    @yield('content')
    {{-- Content --}}
    <footer>
        <div class="row">
            <div class="col-lg">
                <div class="footer-logo">
                    <img src="{{ asset('imgassets/Logo perpus-3 cut.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg footer-link">
                <ul>
                    <li>
                        <h5>LINK TERKAIT</h5>
                    </li>
                    <li><a href="https://smkn7-smr.sch.id/">SMK NEGERI 7 SAMARINDA</a></li>
                    <li><a href="https://buku.kemdikbud.go.id/">SISTEM INFORMASI PERBUKUAN INDONESIA</a></li>
                    <li><a href="https://www.kemdikbud.go.id/">KEMDIKBUDRISTEK</a>
                    </li>
                    <li><a href="https://web.disdikbud.kaltimprov.go.id/">DINAS PENDIDIKAN PROVINSI KALIMANTAN TIMUR</a>
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
            Copyright <a href="https://pplg2021.smkn7-smr.sch.id" class="link">PPLG 2021</a> | ALL RIGHTS RESERVED ©
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
    <script>
        window.onscroll = function() {
            scrollFunction()
        };
        if (window.location.href == 'http://127.0.0.1:8000/' &&
            'http://127.0.0.1:8000/') {
            function scrollFunction() {
                if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                    document.getElementById("navbar").classList.add("scroll")
                    document.getElementById("navbar").classList.add("shadow-sm")
                    document.getElementById("sidebar-burger").classList.add("scroll")
                    document.getElementById("sidebar-burger").classList.add("shadow-sm")
                    document.getElementById("navbar-logo").innerHTML =
                        "<a href='{{ url('/') }}'><img src='{{ asset('imgassets/Logo perpus-3 cut.png') }}' alt=''>"
                } else {
                    document.getElementById("navbar").classList.remove("scroll")
                    document.getElementById("navbar").classList.remove("shadow-sm")
                    document.getElementById("sidebar-burger").classList.remove("scroll")
                    document.getElementById("sidebar-burger").classList.remove("shadow-sm")
                    document.getElementById("navbar-logo").innerHTML =
                        "<a href='{{ url('/') }}'><img src='{{ asset('imgassets/logo1.png') }}' alt=''>"
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

    @yield('script')
    </body>

</html>
