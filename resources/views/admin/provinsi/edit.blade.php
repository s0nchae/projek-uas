@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Edit Data Provinsi</h2>

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

                          <form action="{{ route('admin.provinsi.update', $provinsi->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control"
                                   value="{{ old('tahun', $provinsi->tahun) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Nama Provinsi</label>
                            <input type="text" name="nama" class="form-control"
                                   value="{{ old('nama', $provinsi->nama) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Desimal</label>
                            <input type="text" name="desimal" class="form-control"
                                   value="{{ old('desimal', $provinsi->desimal )}}" required>
                         </div>

                             <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.provinsi.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
