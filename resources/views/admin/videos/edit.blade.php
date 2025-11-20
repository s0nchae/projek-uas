@extends('layout.videolayout')

@section('title', 'Edit Video')

@section('content')

<div class="content-wrapper p-4">

    <h2 class="mb-4">Edit Video</h2>

    <div class="card p-4">

        <form action="{{ route('videos.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="youtube_link" class="form-label">YouTube Link</label>
                <input type="text" name="youtube_link" id="youtube_link"
                       class="form-control" value="{{ $video->youtube_link }}">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>

</div>

@endsection
