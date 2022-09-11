@extends('layout.template_siswa')

@section('content')
    <div class="container all-book">
        <!-- <h2 class="mt-4">Buku Pelajaran</h2> -->
        <div class="row">
            <div class="col-lg col-2">
                <div class="book-filter">
                    <div class="accordion shadow" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    Jenis Buku
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Fisik
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Digital
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    Kelas
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            X
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            XI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            XII
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    Jurusan
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            PPLG / RPL
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            TJKT / TKJ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            DKV / MM
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="grid-container" id="gridContainer">
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
                </div>
            </div>
        </div>
    </div>
@endsection
