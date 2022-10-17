@extends('layout.template_siswa')

@section('content')
    <section class="history-section">
        <div class="container booking-list">
            <h3>Booking List</h3>
            <div class="card booking-info">
                <form class="help-bar">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input class="form-control" type="text" id="search" placeholder="Cari buku mu disini" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input class="form-control" type="date" id="date" placeholder="Tanggal Booking" />
                    </div>
                    <select class="form-select" name="jenis" aria-label="Default select example">
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                    </select>
                </form>
                <div class="status">
                    <p>Status</p>
                    <ul class="grid-status">
                        <li id="all"><a href="#">All</a></li>
                        <li id="verified"><a href="#">Verified</a></li>
                        <li id="unverified"><a href="#">Unverified</a></li>
                        <li id="duedate"><a href="#">Due Date</a></li>
                        <li id="returned"><a href="#">Returned</a></li>
                    </ul>
                </div>
                <div id="history"></div>
                {{-- @foreach ($history as $item)
                    <div class="list-book mb-3" id="history">
                        <span>
                            <p><i class="bi bi-journal-bookmark-fill"></i> {{ $item->keterangan }}</p>
                            <p class="date">{{ date('d-m-Y', strtotime($item->tanggal_booking)) }}</p>
                        </span>
                        <div class="info-book">
                            <span class="cover">
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="">
                            </span>
                            <div class="description">
                                <p class="card-text small muted yellow fw-bold">{{ $item->penerbit }}</p>
                                <span class="jenis-buku small">{{ $item->keterangan }}</span>
                                <p>{{ $item->judul }}</p>
                            </div>
                        </div>
                        <div class="lending-detail">
                            <a href="{{ url('book-detail/' . $item->slug) }}" class="btn btn-primary">Pinjam Lagi</a>
                            <a href="#">
                                <p>Lihat Detail Peminjaman</p>
                            </a>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Filter Status
        $("#all").on('click', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val()
                },
                success: function(data, status) {
                    // console.log(data['history']);

                    $("#all").addClass('filter active')
                    $("#verified").removeClass('filter active')
                    $("#unverified").removeClass('filter active')
                    $("#duedate").removeClass('filter active')
                    $("#returned").removeClass('filter active')
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }

                }
            })
        })
        $("#history").ready(function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val()
                },
                success: function(data, status) {
                    $("#all").addClass('filter active')
                    $("#verified").removeClass('filter active')
                    $("#unverified").removeClass('filter active')
                    $("#duedate").removeClass('filter active')
                    $("#returned").removeClass('filter active')
                    // console.log(data['history']);
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }

                }
            })
        })

        $("#verified").on('click', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val(),
                    status: 2
                },
                success: function(data, status) {
                    $("#all").removeClass('filter active')
                    $("#verified").addClass('filter active')
                    $("#unverified").removeClass('filter active')
                    $("#duedate").removeClass('filter active')
                    $("#returned").removeClass('filter active')
                    // console.log(data['history']);
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }

                }
            })
        })
        $("#unverified").on('click', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val(),
                    status: 1
                },
                success: function(data) {
                    $("#all").removeClass('filter active')
                    $("#verified").removeClass('filter active')
                    $("#unverified").addClass('filter active')
                    $("#duedate").removeClass('filter active')
                    $("#returned").removeClass('filter active')

                    console.log(data['history'] == 0);
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }
                }
            })
        })
        $("#duedate").on('click', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val(),
                    status: 3
                },
                success: function(data, status) {
                    $("#all").removeClass('filter active')
                    $("#verified").removeClass('filter active')
                    $("#unverified").removeClass('filter active')
                    $("#duedate").addClass('filter active')
                    $("#returned").removeClass('filter active')
                    // console.log(data['history']);
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }

                }
            })
        })
        $("#returned").on('click', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val(),
                    status: 4
                },
                success: function(data) {
                    $("#all").removeClass('filter active')
                    $("#verified").removeClass('filter active')
                    $("#unverified").removeClass('filter active')
                    $("#duedate").removeClass('filter active')
                    $("#returned").addClass('filter active')

                    console.log(data['history'] == 0);
                    if (data['history'] == 0) {
                        $("#history").html('Data Tidak Ditemukan')
                    } else {
                        $("#history").html('');
                        for (const v of data['history']) {
                            $("#history").append(
                                `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                            )
                        }
                    }
                }
            })
        })

        // Filter Nama Buku
        $(document).on('change', function() {
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getHistory') }}',
                data: {
                    keyword: $("#search").val(),
                    date: $("#date").val(),
                    jenis: $("select[name=jenis]").val()
                },
                success: function(data, status) {
                    // console.log(data['history']);

                    // $("#all").addClass('filter active')
                    // $("#verified").removeClass('filter active')
                    // $("#unverified").removeClass('filter active')
                    // $("#duedate").removeClass('filter active')
                    // $("#returned").removeClass('filter active')
                    // if (data['history'] == 0) {
                    // $("#history").html('Data Tidak Ditemukan')
                    // } else {
                    $("#history").html('');
                    for (const v of data['history']) {
                        $("#history").append(
                            `<div class="list-book mb-3">
                                <span>
                                    <p><i class="bi bi-journal-bookmark-fill"></i> ${v.keterangan}</p>
                                    <p class="date">${v . tanggal_booking}</p>
                                </span>
                                <div class="info-book">
                                    <span class="cover">
                                        <img src="storage/${v . cover}" alt="">
                                    </span>
                                    <div class="description">
                                        <p class="card-text small muted yellow fw-bold">${v.penerbit}</p>
                                        <span class="jenis-buku small">${v.keterangan}</span>
                                        <p>${v.judul}</p>
                                    </div>
                                </div>
                                <div class="lending-detail">
                                    <a href="buku-detail/${v . slug}" class="btn btn-primary">Pinjam Lagi</a>
                                    <a href="#">
                                        <p>Lihat Detail Peminjaman</p>
                                    </a>
                                </div>
                            </div>`
                        )
                    }
                    // }

                }
            })
        })
    </script>
@endsection
