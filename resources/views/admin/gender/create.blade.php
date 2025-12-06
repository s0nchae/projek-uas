@extends('layout.adminapp')

@section('content')

<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">

            <h2 class="mb-4">Tambah Data Gender</h2>

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
                    <form id="genderForm" action="{{ route('admin.gender.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Tahun</label>
                           <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Laki-Laki</label>
                            <input type="text" name="laki" class="form-control" value="{{ old('laki') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Perempuan</label>
                            <input type="text" name="perempuan" class="form-control" value="{{ old('perempuan') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                        <a href="{{ route('admin.gender.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
