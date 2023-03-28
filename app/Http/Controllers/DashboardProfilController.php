<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('dashboard.profil.edit',[
            "profil" => Profil::all(),
            "title" => "Dashboard | Edit Category",
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $validatedData = $request->validate([
            'alamat' => 'required|max:255',
            'telepon' => 'required',
            'email' => 'required|email',
            'deskripsi' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ]);

        Profil::where('id', $profil->id)
            ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Profil berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
