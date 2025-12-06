@extends('layout.adminapp')

@section('content')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Edit Data Jenjang</h2>

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

                          <form action="{{ route('admin.jenjang.update', $jenjang->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control"
                                   value="{{ old('tahun', $jenjang->tahun) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Pendidikan</label>
                            <input type="text" name="sekolah" class="form-control"
                                   value="{{ old('sekolah', $jenjang->sekolah) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Presentase</label>
                            <input type="text" name="presentase" class="form-control"
                                   value="{{ old('presentase', $jenjang->presentase) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.jenjang.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
