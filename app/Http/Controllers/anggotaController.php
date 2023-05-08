<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $dtanggota = anggota::all();
        return view('anggota.halaman-anggota', compact('dtanggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('anggota.tambah-anggota');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'usia.required' => 'Bidang usia wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
        ]);

         anggota::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
       ]);

      return redirect('halaman-anggota')->with('success', 'Data Berhasil Tersimpan!');
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
        $edit = anggota::findorfail($id);
        return view('anggota.edit-anggota',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Bidang nama wajib diisi.',
            'jenis_kelamin.required' => 'Bidang jenis kelamin wajib diisi.',
            'usia.required' => 'Bidang usia wajib diisi.',
            'alamat.required' => 'Bidang alamat wajib diisi.',
        ]);

         $ubah = anggota::findorfail($id);

        $anggota = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'alamat' => $request->alamat,
        ];

        $ubah->update($anggota);
    
        return redirect('halaman-anggota')->with('success', 'Data Berhasil Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = anggota::findorfail($id);
        $hapus->delete();
        return back();
    }
}
