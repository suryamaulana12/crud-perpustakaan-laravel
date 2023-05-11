<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\pengarang;
use Illuminate\Http\Request;


class pengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $dtpengarang = pengarang::all();
        return view('pengarang.halaman-pengarang', compact('dtpengarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $buku = buku::all();
        return view('pengarang.tambah-pengarang', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'pengarang_id' => 'unique:pengarang,pengarang_id',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'karya_pengarang' => 'required',
        ],[
            'pengarang_id.unique' => 'pengarang sudah ditambahkan, coba edit karyanya aja',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'karya_pengarang.required' => 'Bidang karya pengarang wajib diisi.',
        ]);

       pengarang::create([
            'pengarang_id' => $request->pengarang_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'karya_pengarang' => $request->karya_pengarang,
       ]);

      return redirect('halaman-pengarang')->with('success', 'Data Berhasil Tersimpan!');
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
        $buku = buku::all();
        $edit = pengarang::with('buku')->findorfail($id);
        return view('pengarang.edit-pengarang',compact('edit','buku'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->validate($request,[
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'karya_pengarang' => 'required',
        ],[
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'karya_pengarang.required' => 'Bidang karya pengarang wajib diisi.',
        ]);

        $ubah = pengarang::findorfail($id);

        $pengarang = [
            'pengarang_id' => $request['pengarang_id'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'alamat' => $request['alamat'],
            'karya_pengarang' => $request['karya_pengarang'],
        ];

        $ubah->update($pengarang);
    
        return redirect('halaman-pengarang')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = pengarang::findorfail($id);
        $hapus->delete();
        return back() ;
    }
}
