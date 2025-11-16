<!-- TEMPLATE DETAIL UNTUK MENAMPILKAN DAFTAR SEMUA ARTIKEL DI BAWAH 1 KATEGORI -->

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
    <div class="container mt-5" style="font-style: poppins">
        {{-- Menampilkan nama kategori yang sedang dilihat --}}
        <h3 class="mb-4">Kategori: {{ $categoryName }}</h3>
        <hr>

        <div class="row">
            {{-- Menggunakan variabel $articles yang dilewatkan dari Controller --}}
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    {{-- Ulangi struktur card artikel yang sama --}}
                    <div class="card">
                        <a href="{{ route('edukasi.show', $article->slug) }}" style="text-decoration: none; color: black;">
                            <img src="{{ asset($article->thumbnail_path) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $article->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->judul }}</h5>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">
                                    {{ Str::limit($article->deskripsi_singkat, 75) }}
                                </p>
                                <span class="badge bg-success">{{ $article->kategori }}</span>
                                <small class="text-muted float-end">{{ $article->created_at->format('M d, Y') }}</small>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Tampilkan Link Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links() }}
        </div>
    </div>

@endsection