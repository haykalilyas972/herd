<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    <a href="{{ route('books.create') }}">+ Tambah Buku</a>

    <br><br>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @forelse ($books as $book)
        <h3>{{ $loop->iteration }}. {{ $book->title }}</h3>
        <p>Penulis: {{ $book->author }}</p>
        <p>Tahun Terbit: {{ $book->year }}</p>
        <p>Stok: {{ $book->stock }}</p>
        <a href="{{ route('books.edit', $book->id) }}">Edit</a>
        <form action="{{ route('books.destroy', $book->id) }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

    @csrf
    @method('DELETE')

    <button type="submit">Hapus</button>
</form>
        <hr>
    @empty
        <p>Belum ada data buku.</p>
    @endforelse
</body>
</html>