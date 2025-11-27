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

                          <form action="{{ route('admin.gender.update', $gender->id) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="text" name="tahun" class="form-control"
                                   value="{{ old('tahun', $gender->tahun) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Laki-Laki</label>
                            <input type="text" name="laki" class="form-control"
                                   value="{{ old('laki', $gender->laki) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Perempuan</label>
                            <input type="text" name="perempuan" class="form-control"
                                   value="{{ old('perempuan', $gender->perempuan) }}" required>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Nasional</label>
                            <input type="text" name="nasional" class="form-control"
                                   value="{{ old('tahun', $gender->nasional) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.gender.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
