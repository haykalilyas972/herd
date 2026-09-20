<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            [
                'id' => 1,
                'title' => 'Pemrograman PHP',
                'author' => 'Budi Raharjo',
                'year' => 2022
            ],
            [
                'id' => 2,
                'title' => 'Laravel untuk Pemula',
                'author' => 'Andi Setiawan',
                'year' => 2023
            ],
            [
                'id' => 3,
                'title' => 'Basis Data',
                'author' => 'Citra Lestari',
                'year' => 2021
            ],
            [
                'id' => 4,
                'title' => 'Algoritma dan Pemrograman',
                'author' => 'Dewi Anggraini',
                'year' => 2020
            ],
            [
                'id' => 5,
                'title' => 'Pemrograman Berorientasi Objek',
                'author' => 'Eko Pratama',
                'year' => 2024
            ]
        ];

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}