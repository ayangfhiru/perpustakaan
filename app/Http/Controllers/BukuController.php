<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaBuku = Buku::paginate(20);
        return view('page.buku')->with('semuaBuku', $semuaBuku);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.form-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $buku = new Buku;
            $buku->judul_buku = $request->judul_buku;
            $buku->penulis = $request->penulis;
            $buku->tahun = $request->tahun;
            $buku->save();

            return redirect()->route('buku')->with('success', 'Tambah Buku Berhasil');
        } catch (\Exception $e) {
            return redirect()->route('tambah-buku')->with('failed', $e->getMessage());
        }
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
        $buku = Buku::find($id);
        return view('buku.form-edit')->with('buku', $buku);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $buku = Buku::find($id);
            $buku->judul_buku = $request->judul_buku;
            $buku->penulis = $request->penulis;
            $buku->tahun = $request->tahun;
            $buku->save();

            return redirect()->route('buku')->with('success', 'Success Update Buku');
        } catch (\Exception $e) {
            return redirect()->route('edit-buku')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Buku::where('id_buku', $id)->delete();
            return redirect()->route('buku')->with('success', 'Delete Data Success');
        } catch (\Exception $e) {
            return redirect()->route('buku')->with('failed', 'Delete Data Failed');
        }
    }
}
