<!-- HALAMAN UTAMA MENAMPILKAN KATEGORI DAN DAFTAR ARTIKEL -->

@extends('layout.app')

@section('content')

    <div class="header" style="height: 50vh; background-color: #FF485E; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 2vh">
        <div class="container" style="font-family: poppins; text-align: center; color: white">
            <h1>Cuma butuh scroll <strong><span style="font-size: 48px"><br>buat nafas jadi <span style="text-decoration: underline">lebih lega.</span></span></strong></h1>
        </div>
        <div class="container" style="font-family: poppins; text-align: center; color: white; opacity: 85%; letter-spacing: 0.5px">
            <p>Di sini kamu bakal nemuin penjelasan lengkap tentang rokok dari bahaya,<br>efek yang sering diremehkan, sampai fakta yang jarang dibahas.</p>
        </div>
    </div>
    <div class="container mt-5" style="font-family:poppins">
        <div class="row">
            <div class="col-sm-8">
                <h3>🧠 Bikin Kamu jadi Lebih Tau!</h3>
            </div>
            <div class="col-sm-4" style="display: flex; justify-content: end; align-items: center">
                <li class="nav-item dropdown" style="list-style: none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Pilih Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('edukasi.index') }}">Semua Artikel</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('edukasi.category', 'the-hidden-truth') }}">The Hidden Truth</a></li>
                        <li><a class="dropdown-item" href="{{ route('edukasi.category', 'the-unpopular-facts') }}">The Unpopular Facts</a></li>
                    </ul>
                </li>
            </div>
        </div>
        <div class="row mt-4">
            {{-- Menggunakan variabel $articles yang dilewatkan dari Controller --}}
            @foreach ($latestArticles as $article)
                <div class="col-md-4 mb-4">
                    {{-- Ulangi struktur card artikel yang sama --}}
                    <div class="card">
                        <a href="{{ route('edukasi.show', $article->slug) }}" style="text-decoration: none; color: black;">
                            <img src="{{ asset($article->thumbnail_path) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $article->judul }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $article->judul }}</strong></h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem; margin-bottom: 1rem">
                                    {{ Str::limit($article->deskripsi_singkat, 75) }}
                                </p>
                                <a href="{{route('edukasi.category', Str::slug($article->kategori))}}">
                                    <span class="badge bg-success">{{ $article->kategori }}</span>
                                </a>
                                <small class="text-muted float-end">{{ $article->created_at->format('M d, Y') }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection