<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ: Menampilkan daftar buku
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    // CREATE: Menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // CREATE: Menyimpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:9999',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()
        ->route('books.index')
        ->with('success', 'Buku berhasil ditambahkan!');
    }

    // READ: Menampilkan detail buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // UPDATE: Menampilkan form edit
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE: Menyimpan perubahan buku
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|digit:4|min:2000|max:2026',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil diperbarui!');
    }

    // DELETE: Menghapus buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil dihapus!');
    }
}