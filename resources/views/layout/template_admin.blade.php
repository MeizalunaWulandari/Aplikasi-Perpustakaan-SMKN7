<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    {{-- Boostsrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    {{-- Boostsrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito&display=swap" rel="stylesheet">

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    {{-- Lightbox --}}
    <link rel="stylesheet" href="{{ asset('mycss/lightbox.css') }}">

    <link rel="stylesheet" href="{{ asset('assets_admin/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/css/main/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('mycss/admin.css') }}">

    @yield('assets-top')

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ url('/admin') }}"><img
                                    src="{{ asset('assets_admin/images/cropped-logo_smkn7-1.png') }}" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler d-xl-none">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    {{-- @dd(Request::url()) --}}
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item <?= Request::url() == url('/admin') ? 'active' : '' ?>">
                            <a href="{{ url('/admin') }}" class='sidebar-link'>
                                <i class="bi bi-bar-chart"></i>
                                <span>Data Booking</span>
                            </a>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-book"></i>
                                <span>Data Buku</span>
                            </a>
                            <ul
                                class="submenu <?= ((Request::url() == url('/admin/buku-fisik') ? 'active' : Request::url() == url('/admin/buku-digital')) ? 'active' : Request::url() == url('/admin/buku-kejuruan')) ? 'active' : '' ?>">
                                <li
                                    class="submenu-item <?= Request::url() == url('/admin/buku-fisik') ? 'active' : '' ?>">
                                    <a href="{{ url('/admin/buku-fisik') }}">Buku Fisik</a>
                                </li>
                                <li
                                    class="submenu-item <?= Request::url() == url('/admin/buku-digital') ? 'active' : '' ?>">
                                    <a href="{{ url('/admin/buku-digital') }}">Buku Digital</a>
                                </li>
                                <li
                                    class="submenu-item <?= Request::url() == url('/admin/buku-kejuruan') ? 'active' : '' ?>">
                                    <a href="{{ url('/admin/buku-kejuruan') }}">Buku Kejuruan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item <?= Request::url() == url('/admin/kategori-buku') ? 'active' : '' ?>">
                            <a href="/admin/kategori-buku" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= Request::url() == url('/admin/kurikulum-buku') ? 'active' : '' ?>">
                            <a href="/admin/kurikulum-buku" class='sidebar-link'>
                                <i class="bi bi-clipboard2"></i>
                                <span>Kurikulum</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/logout" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @if (session('status'))
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
                        data-bs-autohide="false">
                        <div class="toast-header">
                            <img src="{{ asset('imgassets/buku.png') }}" alt="">
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

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 © Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Created with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://pplg2021" target="_break">PPLG 2021</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets_admin/js/app.js') }}"></script>

    {{-- Lightbox --}}
    {{-- <script src="{{ asset('myjs/lightbox.js') }}"></script> --}}
    <script src="{{ asset('myjs/lightbox-plus-jquery.js') }}"></script>

    {{-- Datatable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    {{-- Tooltips --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    {{-- Toast --}}
    @if (session('status'))
        <script>
            $(document).ready(function() {
                // $("#liveToastBtn").click(function() {
                $("#liveToast").toast("show");
                // });
            });
        </script>
    @endif

    @yield('script')
</body>

</html>
