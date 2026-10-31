
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Judul Buku</label>
            <input type="text" name="title"
                   value="{{ old('title', $book->title) }}" required>
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="author"
                   value="{{ old('author', $book->author) }}" required>
        </div>

        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="year"
                   value="{{ old('year', $book->year) }}"
                   min="1000" max="9999" required>
        </div>

        <div>
            <label>Stok</label>
            <input type="number" name="stock"
                   value="{{ old('stock', $book->stock) }}"
                   min="0" required>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="{{ route('books.index') }}">Kembali</a></p>
</body>
</html>