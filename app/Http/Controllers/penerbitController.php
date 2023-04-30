<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penerbit;

class penerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtpenerbit = penerbit::all();
        return view('penerbit.halaman-penerbit', compact('dtpenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.tambah-penerbit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        penerbit::create([
            'nama' => $request->nama,
            'terbitan_populer' => $request->terbitan_populer,
            'alamat' => $request->alamat,
       ]);

      return redirect('halaman-penerbit')->with('success', 'Data Berhasil Tersimpan!');
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
        $edit = penerbit::findorfail($id);
        return view('penerbit.edit-penerbit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = penerbit::findorfail($id);

        $pengarang = [
            'nama' => $request->nama,
            'terbitan_populer' => $request->terbitan_populer,
            'alamat' => $request->alamat,
        ];

        $ubah->update($pengarang);
    
        return redirect('halaman-penerbit')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $hapus = penerbit::findorfail($id);
        $hapus->delete();
        return back()->with('success', 'Data Berhasil Terhapus!');
    }
}
