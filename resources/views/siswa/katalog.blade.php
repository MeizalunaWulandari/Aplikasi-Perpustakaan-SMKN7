@extends('layout.template_siswa')

@section('content')
    <header class="all-book-header">
        <div class="container">
            <div class="row">
                @foreach ($kategoriLoop as $item)
                    <div class="col-lg mb-3">
                        <a href="{{ url('katalog/' . $item->slug) }}">
                            <div
                                class="card d-flex align-items-center <?= Request::url() == url('katalog/' . $item->slug) ? 'active' : '' ?> shadow">
                                <img src="{{ url('imgassets/buku.png') }}" alt="">
                                <p>{{ $item->name }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </header>
    <section>
        <div class="container all-book">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="mb-4">{{ $kategori->name }}</h2>
                </div>
                <div>
                    <form action="{{ Request::url() }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Book" aria-label="Search Book"
                                aria-describedby="button-addon2" name="search-book">
                            <button class="btn btn-primary" type="button" id="button">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
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
                                        @foreach ($jenis as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="flexCheckChecked" name="jenis">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{ $item->keterangan }}
                                                </label>
                                            </div>
                                        @endforeach
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
                                        @foreach ($kelas as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="flexCheckChecked" name="kelas">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{ $item->nama }}
                                                </label>
                                            </div>
                                        @endforeach
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
                                        @foreach ($jurusan as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="flexCheckChecked" name="jurusan">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{ $item->nama }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="grid-container" id="gridContainer">
                        @foreach ($buku as $item)
                            <div class="grid-item">
                                <div class="book">
                                    <a href="{{ url('book-detail/' . $item->slug_buku) }}">
                                        <div class="card">
                                            <span class="cover">
                                                <img src="{{ asset('storage/' . $item->cover) }}"
                                                    alt="{{ $item->judul }}">
                                            </span>
                                            <div class="description">
                                                <p class="card-text small muted blue">Availble Book
                                                    <b>{{ $item->stock }}</b>
                                                </p>
                                                <p class="card-text small muted yellow fw-bold">
                                                    {{ $item->penerbit }}
                                                </p>
                                                <span class="jenis-buku small">{{ $item->jenis_buku }}</span>
                                                <p>{{ $item->judul }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).on('change', function() {
            var jenis = [];
            var kelas = [];
            var jurusan = [];
            $.each($("input[name='jenis']:checked"), function() {
                jenis.push($(this).val());
            });
            $.each($("input[name='kelas']:checked"), function() {
                kelas.push($(this).val());
            });
            $.each($("input[name='jurusan']:checked"), function() {
                jurusan.push($(this).val());
            });
            // console.log(jenis, kelas, jurusan);
            $.ajax({
                type: 'GET',
                url: '{{ url('api/getBukuFilter') }}',
                data: {
                    jenis: jenis,
                    kelas: kelas,
                    jurusan: jurusan,
                    slug: '{{ $kategori->slug }}',
                },
                success: function(data) {
                    console.log(data);
                }
            })
        });
    </script>
@endsection
