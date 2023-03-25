<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Profil;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header = 'INFORMASI BUKU';
        $pagination = 10;
        $totalbuku = DB::table('books')->sum('jumlah');

        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }
        return view('dashboard.books.index', [
            "profil" => Profil::all(),
            "title" => "Dashboard | Books",
            "header" => $header,
            "categories" => Category::all(), 
            "books" => Book::latest()->filter(request(['cari', 'kategori']))->paginate(10),
            "totalbuku" => $totalbuku
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            "profil" => Profil::all(),
            "title" => "Dashboard | Create Book",
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
            'penulis' => 'max:255',
            'cover' => 'image|file|max:2024',
            'penerbit' => 'max:255',
            'tahun' => '',
            'jumlah' => ''
        ]);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('book-covers');
        }

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
        return view('dashboard.books.edit', [
            "profil" => Profil::all(),
            "title" => "Dashboard | Edit Book",
            "categories" => Category::all(),
            'book' => $book
        ]);
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
        $rules = [
            'category_id' => 'required',
            'judul' => 'required|max:255',
            'penulis' => 'max:255',
            'cover' => 'image|file|max:2048',
            'penerbit' => 'max:255',
            'tahun' => '',
            'jumlah' => ''
        ];

        if ($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('cover')) {
            if($book->cover){
                Storage::delete($book->cover);
            }
            $validatedData['cover'] = $request->file('cover')->store('book-covers');
        }

        Book::where('id', $book->id)
            ->update($validatedData);

        return redirect('/dashboard/books')->with('success', 'Data Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->cover){
            Storage::delete($book->cover);
        }
        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('success', 'Buku berhasil dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
