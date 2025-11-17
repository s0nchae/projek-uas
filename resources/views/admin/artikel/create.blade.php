@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Tambah Artikel Baru</h2>

            {{-- Tampilkan error --}}
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

                    <!-- FORM ARTIKEL -->
                    <form id="artikelForm" action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="deskripsi_singkat" class="form-control" rows="2" required>{{ old('deskripsi_singkat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea name="konten" id="konten" class="konten" rows="6">{{ old('konten') }}</textarea>
                        </div>

                        {{-- Kategori dropdown + add new --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <div class="input-group">
                                <select name="kategori" class="form-select" required>
                                    <option value="" disabled selected>Pilih kategori...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}" {{ old('kategori') == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                        </div>

                        <div class="mb-3">
                            <label>Status</label><br>
                            <select class="form-select" name="is_published">
                                <option value="1">Published</option>
                                <option value="0" selected>Draft</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

{{-- Modal tambah kategori --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="addCategoryForm">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="name" class="form-control" placeholder="Nama kategori" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>
  </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea.konten',
        height: 350,
    });

    // Pastikan konten TinyMCE tersimpan ke textarea sebelum submit
    $('#artikelForm').on('submit', function() {
        tinymce.triggerSave();
        console.log($('textarea[name="konten"]').val()); // pastikan ada isinya
    });

    // FORM KATEGORI: pakai AJAX
    $('#addCategoryForm').on('submit', function(e){
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: '{{ route("admin.category.store") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(res){
                if(res.success){
                    $('select[name="kategori"]').append(
                        `<option value="${res.category.name}" selected>${res.category.name}</option>`
                    );
                    form[0].reset();
                    $('#addCategoryModal').modal('hide');
                    alert('Kategori berhasil ditambahkan!');
                }
            },
            error: function(){
                alert('Gagal menambahkan kategori!');
            }
        });
    });
</script>
@endsection
