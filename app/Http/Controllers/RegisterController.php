<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register',
            "alamat" => "Jln. Indrajaya II, Blok B, No. 36 Bandung - Jawa Barat",
            "email" => "Caturwati@gmail.com",
            "telepon" => "0811-215-339",
            "categories" => Category::all() 
        ]);
    }

    public function store(Request $request)
    {
        // return request()->all();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi Berhasil, Silahkan Login!');
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login!');

    }
}
