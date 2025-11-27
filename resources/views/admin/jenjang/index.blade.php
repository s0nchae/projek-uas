@extends('layout.adminapp')
@section('content')
@include('layout.partials.admin.styleadmin')

<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Kelola Jenjang Data Perokok</h2>
                <a href="{{ route('admin.jenjang.create') }}" class="btn btn-primary">+ Tambah Data</a>
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
                            <tr class="headtb">
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Pendidikan</th>
                                <th>Presentase</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($jenjang as $j)

                                <tr class="bodytb">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->tahun }}</td>
                                    <td>{{ $j->sekolah }}</td>
                                    <td>{{ $j->presentase }}</td>
                                    <div class="tombol">
                                         <td>

                                            <a href="{{ route('admin.jenjang.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('admin.jenjang.destroy', $j->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </div>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
