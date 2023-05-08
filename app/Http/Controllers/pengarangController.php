<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengarang;


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
        return view('pengarang.tambah-pengarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'karya_pengarang' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'karya_pengarang.required' => 'Bidang karya pengarang wajib diisi.',
        ]);

       pengarang::create([
            'nama' => $request->nama,
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
        $edit = pengarang::findorfail($id);
        return view('pengarang.edit-pengarang',compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'karya_pengarang' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
            'karya_pengarang.required' => 'Bidang karya pengarang wajib diisi.',
        ]);

        $ubah = pengarang::findorfail($id);

        $pengarang = [
            'nama' => $request['nama'],
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
