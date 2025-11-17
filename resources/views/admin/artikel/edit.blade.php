@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Edit Artikel</h2>

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.artikel.update', $artikel->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control"
                                   value="{{ old('judul', $artikel->judul) }}" required>
                        </div>

                        {{-- Deskripsi Singkat --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="deskripsi_singkat" class="form-control" rows="3" required>{{ old('deskripsi_singkat', $artikel->deskripsi_singkat) }}</textarea>
                        </div>

                        {{-- Konten --}}
                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea name="konten" class="form-control" id="konten" rows="7" required>{{ old('konten', $artikel->konten) }}</textarea>
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control"
                                   value="{{ old('kategori', $artikel->kategori) }}" required>
                        </div>

                        {{-- Author --}}
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control"
                                   value="{{ old('author', $artikel->author) }}" required>
                        </div>

                        {{-- Thumbnail lama --}}
                        <div class="mb-3">
                            <label class="form-label d-block">Thumbnail Saat Ini</label>

                            @if($artikel->thumbnail_path)
                                <img src="{{ asset($artikel->thumbnail_path) }}" 
                                     width="160" height="100"
                                     style="object-fit: cover; border-radius: 5px; border:1px solid #ccc;">
                            @else
                                <p class="text-muted">Tidak ada thumbnail</p>
                            @endif
                        </div>

                        {{-- Ganti Thumbnail --}}
                        <div class="mb-3">
                            <label class="form-label">Ganti Thumbnail (opsional)</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah</small>
                        </div>

                        {{-- Status publish --}}
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_published" class="form-select">
                                <option value="1" {{ $artikel->is_published ? 'selected' : '' }}>Published</option>
                                <option value="0" {{ !$artikel->is_published ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
