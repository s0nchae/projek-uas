@extends('layout.adminapp')

@section('content')

<div class="content-wrapper pt-3">

    <section class="content">
        <div class="container-fluid">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3" style="font-family:poppins">
                <h2>Manajemen Role User</h2>
            </div>

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Tabel user --}}
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th style="width:50px;">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width:200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-start ps-3">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        {{-- Form untuk update role --}}
                                        <form action="{{ route('admin.users.roles.update', $user->id) }}" method="POST" class="d-flex gap-1 align-items-center">
                                            @csrf
                                            <select name="role" class="form-select form-select-sm" style="width:120px;">
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm px-2">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Belum ada user</td>
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
