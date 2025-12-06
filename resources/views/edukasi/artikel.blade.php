<!-- TEMPLATE DETAIL ARTIKEL TUNGGAL  -->

@extends('layout.app')

@section('content')



<div class="content m-5">
    <div class="container " style="width: 100%; max-width: 100vh">
    <a href="{{ route('edukasi.index') }}" class="btn mb-3" style="font-family: poppins; cursor: pointer; color: #000000ff" onmouseover="this.style.fontWeight='bold'; this.style.textDecoration='underline';" onmouseout="this.style.fontWeight='normal'; this.style.textDecoration='none';" >
       ← &nbsp; Kembali
    </a>
    </div>

    {{-- 1. GAMBAR UTAMA ARTIKEL (DINAMIS) --}}
    <div class="container" style="width: 100%; max-width: 100vh; height: 200px; overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center">
        {{-- Menggunakan path dari database ($article->thumbnail_path) --}}
        <img width="100%" height="100%" style="object-fit: cover; object-position: center; border-radius: 10px" 
             src="{{ asset($article->thumbnail_path) }}" 
             alt="{{ $article->judul }}">
    </div>

    <div class="container" style="width: 100%; max-width: 100vh">
        {{-- 2. LABEL KATEGORI (DINAMIS) --}}
        <div class="card px-2 py-1 mb-0 mt-2" style="font-size: 12px; font-family: poppins; display: inline-block; text-align: left; background-color: green; color: white; letter-spacing: 0.5px">
            <strong>{{ $article->kategori }}</strong>
        </div>
    </div>

    {{-- 3. JUDUL ARTIKEL (DINAMIS) --}}
    <div class="container mt-4" style="width: 100%; max-width: 100vh; font-family: poppins">
        <h2><strong>{{ $article->judul }}</strong></h2>
    </div>

    {{-- 4. DESKRIPSI SINGKAT & METADATA (DINAMIS) --}}
    <div class="container mt-3" style="width: 100%; max-width: 100vh; font-family: poppins">
        <p style="opacity: 85%">{{ $article->deskripsi_singkat }}</p>
        <p class="text-muted small mb-1">
            By <strong>{{ $article->author }}</strong> • {{ $article->created_at->format('M d, Y') }}
        </p>
        <hr>
    </div>

    {{-- 5. KONTEN UTAMA ARTIKEL (DINAMIS) --}}
    {{-- {!! !!} digunakan untuk menampilkan konten HTML dari database --}}
    <div class="container mt-3" style="width: 100%; max-width: 100vh; text-align: justify; font-family: poppins">
        {!! $article->konten !!}
        <hr>
    </div>

    {{-- 6. ARTIKEL LAINNYA (CAROUSEL DINAMIS) --}}
    <div class="container mt-5" style="width: 100%; max-width: 150vh">
        <h5 style="margin-bottom: 1rem; text-align: center; font-family: poppins">Artikel Lainnya</h5>
        <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            
                @php
                    // Membagi artikel terkait menjadi kelompok 3 (sesuai layout col-md-4)
                    $chunkedArticles = $relatedArticles->chunk(3);
                    $i = 0;
                @endphp

                @foreach ($chunkedArticles as $chunk)
                    {{-- Menentukan item pertama sebagai 'active' --}}
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $relatedArticle)
                                <div class="col-md-4">
                                    <div class="card">
                                        {{-- Link ke detail artikel menggunakan slug --}}
                                        <a href="{{ route('edukasi.show', $relatedArticle->slug) }}" style="text-decoration: none; color: inherit;">
                                            <img src="{{ asset($relatedArticle->thumbnail_path) }}" class="card-img-top" alt="{{ $relatedArticle->judul }}" style="width: 100%; height: 30vh; object-fit: cover; object-position: center;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $relatedArticle->judul }}</h5>
                                                {{-- Batasi deskripsi singkat agar rapi --}}
                                                <p class="card-text">{{ Str::limit($relatedArticle->deskripsi_singkat, 50) }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
            
            </div>
        
            {{-- BUTTONS CAROUSEL (Tidak perlu diubah, biarkan statis) --}}
            <style>
            .carousel-control-prev:hover{ background-image: linear-gradient(to right, #0000007a, transparent); transition: 0.2s ease; }
            .carousel-control-next:hover{ background-image: linear-gradient(to left, #0000007a, transparent); transition: 0.2s ease; }
            </style>

            <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
        
            <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
            
        </div>
    </div>
</div>
@endsection