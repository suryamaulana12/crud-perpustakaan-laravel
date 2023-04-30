<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = buku::all();
        return view('buku.halaman-buku', compact('buku'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('buku.tambah-buku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $nm = $request->gambar;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

        $dtUpload = new buku;
        $dtUpload->judul = $request->judul;
        $dtUpload->pengarang = $request->pengarang;
        $dtUpload->penerbit = $request->penerbit;
        $dtUpload->genre = $request->genre;
        $dtUpload->tahun_terbit = $request->tahun_terbit;
        $dtUpload->gambar = $namaFile;

        $nm->move(public_path().'/template/img', $namaFile);
        $dtUpload->save();

      return redirect('halaman-buku')->with('success', 'Data Berhasil Tersimpan!');
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
    public function edit($id)
    {
        $edit = buku::findorfail($id);
        return view('buku.edit-buku',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = buku::findorfail($id);
        $awal = $ubah->gambar;

        $edit = [
            'judul' => $request['judul'],
            'pengarang' => $request['pengarang'],
            'penerbit' => $request['penerbit'],
            'genre' => $request['genre'],
            'tahun_terbit' => $request['tahun_terbit'],
            'gambar' => $awal,
        ];
        
        $request->gambar->move(public_path().'/template/img', $awal);
        $ubah->update($edit);

    
        return redirect('halaman-buku')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = buku::findorfail($id);

        $file = public_path('/template/img/').$hapus->gambar;
       if (file_exists($file)) {
            @unlink($file);
       }
        $hapus->delete();
        return back()->with('success', 'Data Berhasil Terhapus!');
    }
}
