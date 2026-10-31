
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title"
                   value="{{ old('title') }}" required>
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="author"
                   value="{{ old('author') }}" required>
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year"
                   value="{{ old('year') }}"
                   min="1000" max="9999" required>
        </div>

        <div>
            <label>Stok</label>
            <input type="number" name="stock"
                   value="{{ old('stock') }}"
                   min="0" required>
        </div>

        <button type="submit">Simpan</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>
</body>
</html>