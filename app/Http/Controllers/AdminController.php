<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Halaman dashboard admin
    public function admin()
    {
        return view('admin.index');
    }

    // Halaman manajemen role user
    public function showUserRoles()
    {
        $users = User::all(); // Ambil semua user
        return view('admin.roles.index', compact('users'));
    }

    // Update role user
    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input role
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role user berhasil diperbarui!');
    }
}
