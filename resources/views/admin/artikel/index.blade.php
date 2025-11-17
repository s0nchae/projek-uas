@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">

    <section class="content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-3" style="font-family:poppins">
                <h2>Kelola Artikel</h2>
                <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">+ Tambah Artikel</a>
            </div>

            <div class="card">
                <div class="card-body table-responsive">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($artikel as $key => $a)
                                <tr>
                                    <td>{{ $artikel->firstItem() + $key }}</td>

                                    <td>
                                        @if($a->thumbnail_path)
                                            <img src="{{ asset($a->thumbnail_path) }}" width="70" height="45" style="object-fit: cover">

                                        @else
                                            <span class="text-muted">–</span>
                                        @endif
                                    </td>

                                    <td>{{ $a->judul }}</td>
                                    <td>{{ $a->kategori }}</td>
                                    <td>{{ $a->author }}</td>

                                    <td>
                                        @if($a->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>

                                    <td>{{ $a->created_at->format('d M Y') }}</td>

                                    <td>
                                        <a href="{{ route('admin.artikel.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.artikel.destroy', $a->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Belum ada artikel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $artikel->links() }}
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
