<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = 'INFORMASI BUKU';
        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }
        return view('dashboard.books.index', [
            "alamat" => "Jln. Indrajaya II, Blok B, No. 36 Bandung - Jawa Barat",
            "email" => "Caturwati@gmail.com",
            "telepon" => "0811-215-339",
            "title" => "Dashboard | Books",
            "header" => $header,
            "categories" => Category::all(), 
            "books" => Book::latest()->filter(request(['cari', 'kategori']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            "alamat" => "Jln. Indrajaya II, Blok B, No. 36 Bandung - Jawa Barat",
            "email" => "Caturwati@gmail.com",
            "telepon" => "0811-215-339",
            "title" => "Dashboard | Create",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'judul' => 'required|max:255',
            'slug' => 'required|unique:books',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required',
            'jumlah' => 'required'
        ]);

        Book::create($validatedData);

        return redirect('/dashboard/books')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
