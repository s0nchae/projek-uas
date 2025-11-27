@extends('layout.videolayout')

@section('title', 'Kelola Video')

@section('content')

<div class="content-wrapper mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Video</h2>

        <a href="{{ route('videos.create') }}" class="btn btn-primary">
            + Tambah Video Baru
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Thumbnail</th>
                        <th>Link</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($videos as $index => $video)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            {{-- Thumbnail --}}
                            <td style="width: 200px;">
                                <iframe
                                    width="200"
                                    height="120"
                                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                    frameborder="0"
                                    allowfullscreen>
                                </iframe>
                            </td>

                            <td>
                                <a href="{{ $video->youtube_link }}" target="_blank">
                                    {{ $video->youtube_link }}
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('videos.destroy', $video->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus video ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
