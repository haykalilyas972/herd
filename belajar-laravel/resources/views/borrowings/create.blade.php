<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
</head>
<body>
    <h1>Tambah Peminjaman Buku</h1>

    @if ($errors->any())
        <div>
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <label>Anggota:</label>
        <br>
        <select name="member_id" required>
            <option value="">-- Pilih Anggota --</option>

            @foreach ($members as $member)
                <option value="{{ $member->id }}"
                    {{ old('member_id') == $member->id ? 'selected' : '' }}>
                    {{ $member->name }} ({{ $member->member_code }})
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Buku:</label>
        <br>
        <select name="book_id" required>
            <option value="">-- Pilih Buku --</option>

            @foreach ($books as $book)
                <option value="{{ $book->id }}"
                    {{ old('book_id') == $book->id ? 'selected' : '' }}>
                    {{ $book->title }} (Stok: {{ $book->stock }})
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Jumlah Buku:</label>
        <br>
        <input
            type="number"
            name="quantity"
            min="1"
            value="{{ old('quantity', 1) }}"
            required
        >

        <br><br>

        <button type="submit">Simpan Peminjaman</button>
    </form>

    <br>

    <a href="{{ route('borrowings.index') }}">Kembali</a>
</body>
</html>