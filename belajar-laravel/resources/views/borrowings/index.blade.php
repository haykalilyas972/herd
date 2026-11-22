<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
</head>
<body>
    <h1>Daftar Peminjaman Buku</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <a href="{{ route('borrowings.create') }}">+ Tambah Peminjaman</a>

    <br><br>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    @forelse ($borrowings as $borrowing)
        <h3>Peminjaman #{{ $borrowing->id }}</h3>

        <p>Anggota: {{ $borrowing->member->name }}</p>
        <p>Petugas: {{ $borrowing->user->name }}</p>
        <p>Tanggal Peminjaman: {{ $borrowing->borrowing_date }}</p>
        <p>Batas Pengembalian: {{ $borrowing->due_date }}</p>
        <p>Tanggal Pengembalian: {{ $borrowing->return_date ?? '-' }}</p>
        <p>Status: {{ $borrowing->status }}</p>

        <h4>Detail Buku:</h4>

        @foreach ($borrowing->details as $detail)
            <p>
                {{ $detail->book->title }}
                - Jumlah: {{ $detail->quantity }}
            </p>
        @endforeach

        {{-- Tombol pengembalian --}}
        @if ($borrowing->status == 'borrowed')
            <form
                action="{{ route('borrowings.return', $borrowing->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')"
            >
                @csrf
                @method('PATCH')

                <button type="submit">Kembalikan Buku</button>
            </form>
        @else
            <p style="color: green;">
                Buku sudah dikembalikan.
            </p>
        @endif

        <hr>
    @empty
        <p>Belum ada transaksi peminjaman.</p>
    @endforelse

    <br>
    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>