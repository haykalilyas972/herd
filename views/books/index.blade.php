@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <h2>Daftar Buku</h2>

    <ul>
        @foreach($books as $book)
            <li>
                <strong>{{ $book['title'] }}</strong>
                <br>
                Penulis: {{ $book['author'] }}
                <br>
                Tahun Terbit: {{ $book['year'] }}
                <br>
                <a href="/books/{{ $book['id'] }}">Lihat Detail</a>
            </li>

            <br>
        @endforeach
    </ul>

@endsection