@extends('layout.videolayout')

@section('title', 'Tambah Video')

@section('content')

<div class="content-wrapper p-4">

    <h2 class="mb-4">Tambah Video Baru</h2>

    <div class="card p-4">

        <form action="{{ route('videos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="youtube_link" class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" id="youtube_link"
                       class="form-control" placeholder="Paste YouTube URL..."
                       value="{{ old('youtube_link') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>

</div>

@endsection
