<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtgenre = genre::all();
        return view('genre.halaman-genre', compact('dtgenre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.tambah-genre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'genre' => 'required',
        ],[
            'genre.required' => 'Bidang genre wajib diisi.',
        ]);

        genre::create([
            'genre' => $request->genre,
       ]);

      return redirect('halaman-genre')->with('success', 'Data Berhasil Tersimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $edit = genre::findorfail($id);
        return view('genre.edit-genre',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'genre' => 'required',
        ],[
            'genre.required' => 'Bidang genre wajib diisi.',
        ]);

        $ubah = genre::findorfail($id);

        $genre = [
            'genre' => $request->genre,
        ];

        $ubah->update($genre);
    
        return redirect('halaman-genre')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = genre::findorfail($id);
        $hapus->delete();
        return back();
    }
}
