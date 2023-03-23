<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profil;

class DashboardController extends Controller
{
    public function index()
    {
        $header = 'INFORMASI BUKU';
        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }
        return view('dashboard.index', [
            "profil" => Profil::all(),
            "title" => "Dashboard",
            "header" => $header,
            "categories" => Category::all(), 
            "books" => Book::latest()->filter(request(['cari', 'kategori']))->paginate(10)
        ]);
    }
}
