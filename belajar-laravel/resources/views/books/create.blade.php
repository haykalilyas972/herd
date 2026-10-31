<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title"
                   value="{{ old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="author"
                   value="{{ old('author') }}">
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year"
                   value="{{ old('year') }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Stok</label>
            <input type="number" name="stock"
                   value="{{ old('stock') }}">
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ route('books.index') }}">Kembali</a></p>
</body>
</html>