@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Edit Data Usia</h2>

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

                          <form action="{{ route('admin.usia.update', $usia->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control"
                                   value="{{ old('tahun', $usia->tahun) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Nama Provinsi</label>
                            <input type="text" name="umur" class="form-control"
                                   value="{{ old('umur', $usia->umur) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Presentase</label>
                            <input type="text" name="presentase" class="form-control"
                                   value="{{ old('presentase', $usia->presentase )}}" required>
                         </div>

                             <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.usia.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
