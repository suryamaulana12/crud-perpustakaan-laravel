<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\genre;
use Illuminate\Support\Facades\File;


class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $buku = buku::with('genre')->where('judul','LIKE','%' .$request->search.'%')->paginate(6);
        }else {
            $buku = buku::with('genre')->paginate(3);
        }

        return view('buku.halaman-buku', compact('buku'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = genre::all();
        return view('buku.tambah-buku', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'judul' => 'required|min:5|max:50',
            'tahun_terbit' => 'required|',
            'gambar' => 'required|max:3072|mimes:jpeg,jpg,png,',
        ],[
            'judul.required' => 'Bidang judul wajib diisi.',
            'judul.min' => 'Minimal harus 5 karakter',
            'judul.max' => 'Maximal harus 50 karakter',
            'pengarang.required' => 'Bidang pengarang wajib diisi.',
            'penerbit.required' => 'Bidang penerbit wajib diisi.',
            'tahun_terbit.required' => 'Bidang tahun terbit wajib diisi.',
            'gambar.required' => 'Bidang gambar wajib diisi.',
            'gambar.max' => 'ukuran gambar maksimal 3Mb',
            'gambar.mimes' => 'Yang anda masukan bukan ekstensi jpeg,jpg,png',

        ]
    );


        $nm = $request->gambar;
        $namaFile = $nm->hashName();

        $dtUpload = new buku;
        $dtUpload->judul = $request->judul;
        $dtUpload->pengarang = $request->pengarang;
        $dtUpload->penerbit = $request->penerbit;
        $dtUpload->genre_id = $request->genre_id;
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
        $genre = genre::all();
        $edit = buku::with('genre')->findorfail($id);
        return view('buku.edit-buku',compact('edit','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // menambahkan validasi pada setiap inputan tabel
         $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'judul' => 'required|min:5|max:50',
            'tahun_terbit' => 'required|',
            'gambar' => 'max:3072|mimes:jpeg,jpg,png,',
        ],[
            'judul.required' => 'Bidang judul wajib diisi.',
            'judul.min' => 'Minimal harus 5 karakter',
            'judul.max' => 'Maximal harus 50 karakter',
            'pengarang.required' => 'Bidang pengarang wajib diisi.',
            'penerbit.required' => 'Bidang penerbit wajib diisi.',
            'tahun_terbit.required' => 'Bidang tahun terbit wajib diisi.',
            'gambar.max' => 'ukuran gambar maksimal 3Mb',
            'gambar.mimes' => 'Yang anda masukan bukan ekstensi jpeg,jpg,png',

        ]
    );

        $ubah = buku::findorfail($id);
        $awal = $ubah->gambar;

        if ($request->hasFile('gambar')) {
            if (File::exists(public_path(). '/template/img/'.$awal)) {
                File::delete(public_path().'/template/img/'.$awal);
                
                $awal = $request->gambar->hashName();
                $request->gambar->move(public_path().'/template/img', $awal); 
            }
        }
        $edit = [
            'judul' => $request['judul'],
            'pengarang' => $request['pengarang'],
            'penerbit' => $request['penerbit'],
            'genre_id' => $request['genre_id'],
            'tahun_terbit' => $request['tahun_terbit'],
            'gambar' => $awal,
        ];
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
        return back();
    }
}
