<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    // Menampilkan form tambah pengguna
    public function create()
    {
        return view('users.create');
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,petugas',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Menampilkan detail pengguna
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Menampilkan form edit pengguna
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Memperbarui data pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,petugas',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                ->with('error', 'Kamu tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}