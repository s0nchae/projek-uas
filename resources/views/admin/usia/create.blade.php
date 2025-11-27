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
                    <form id="genderForm" action="{{ route('admin.usia.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                           <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Umur</label>
                            <input type="text" name="umur" class="form-control" value="{{ old('umur') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Presentase</label>
                            <input type="text" name="presentase" class="form-control" value="{{ old('presentase') }}" required>
                        </div>


                        <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                        <a href="{{ route('admin.usia.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
