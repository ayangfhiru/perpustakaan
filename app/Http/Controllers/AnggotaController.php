<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::paginate(20);
        return view('page.anggota')->with('semuaAnggota', $anggota);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.form-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $anggota = new Anggota;
            $anggota->nama_anggota = $request->nama_anggota;
            $anggota->alamat = $request->alamat;
            $anggota->nomor_telepon = $request->nomor_telepon;
            $anggota->save();

            return redirect()->route('anggota')->with('success', 'Success Menambahkan Anggota');
        } catch (\Exception $e) {
            return redirect()->route('tambah-anggota')->with('failed', 'Gagal Menambahkan Anggota');
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
        $anggota = Anggota::find($id);
        return view('anggota.form-update')->with('anggota', $anggota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $anggota = Anggota::find($id);
            $anggota->nama_anggota = $request->nama_anggota;
            $anggota->nomor_telepon = $request->nomor_telepon;
            $anggota->alamat = $request->alamat;
            $anggota->save();

            return redirect()->route('anggota')->with('success', 'Update Anggota Success');
        } catch (\Exception $e) {
            return redirect()->route('edit-anggota')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Anggota::where('id_anggota', $id)->delete();
            return redirect()->route('anggota')->with('success', 'Delete Data Success');
        } catch (\Exception $e) {
            return redirect()->route('anggota')->with('failed', 'Delete Data Failed');
        }
    }
}
