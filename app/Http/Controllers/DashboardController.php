<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $header = 'INFORMASI BUKU';
        $totalbuku = DB::table('books')->sum('jumlah');

        if (request('kategori')) {
            $kategori = Category::firstWhere('name', request('kategori'));
            $header = 'KATEGORI : ' . $kategori->name;
        }
        return view('dashboard.index', [
            "profil" => Profil::all(),
            "title" => "Dashboard",
            "header" => $header,
            "categories" => Category::all(), 
            "books" => Book::all(),
            "totalbuku" => $totalbuku
        ]);
    }
}
