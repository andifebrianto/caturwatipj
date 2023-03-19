<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

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
            "alamat" => "Jln. Indrajaya II, Blok B, No. 36 Bandung - Jawa Barat",
            "email" => "Caturwati@gmail.com",
            "telepon" => "0811-215-339",
            "title" => "Dashboard",
            "header" => $header,
            "categories" => Category::all(), 
            "books" => Book::latest()->filter(request(['cari', 'kategori']))->paginate(10)
        ]);
    }
}
