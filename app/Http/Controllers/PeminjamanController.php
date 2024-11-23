<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use DateTime;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaPinjaman = Peminjaman::with(['buku', 'anggota'])
            ->whereNull('tanggal_kembali',)
            ->paginate(20);
        return view('page.peminjaman')->with('semuaPinjaman', $semuaPinjaman);
    }

    /**
     * Display a listing of the resource .
     */
    public function bookReturned()
    {
        $semuaPinjaman = Peminjaman::with(['buku', 'anggota'])
            ->whereNotNull('tanggal_kembali')
            ->paginate(20);
        return view('page.peminjaman')->with('semuaPinjaman', $semuaPinjaman);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $buku = Buku::all();
            $anggota = Anggota::all();
            return view('pinjaman.form-add')
                ->with('buku', $buku)
                ->with('anggota', $anggota);
        } catch (\Exception $e) {
            return redirect()->route('pinjaman')->with('failed', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tanggalPinjam = new DateTime($request->tanggal_pinjam);
            $pinjaman = new Peminjaman;
            $pinjaman->id_buku = $request->judul_buku;
            $pinjaman->id_anggota = $request->nama_anggota;
            $pinjaman->tanggal_pinjam = $tanggalPinjam;
            $pinjaman->save();

            return redirect()->route('pinjaman')->with('success', 'Penambahan Data Peminjaman Berhasil');
        } catch (\Exception $e) {
            return redirect()->route('tambah-pinjaman')->with('failed', $e->getMessage());
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
        try {
            $pinjaman = Peminjaman::with(['buku', 'anggota'])->where('id_peminjaman', $id)->get();
            $buku = Buku::all();
            $anggota = Anggota::all();

            return view('pinjaman.form-edit')
                ->with('pinjaman', $pinjaman[0])
                ->with('buku', $buku)
                ->with('anggota', $anggota);
        } catch (\Exception $e) {
            return redirect()->route('pinjaman')->with('failed', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tanggalPinjam = new DateTime($request->tanggal_pinjam);
        $tanggalKembali = new DateTime($request->tanggal_pengembalian);

        try {
            $pinjaman = Peminjaman::find($id);
            $pinjaman->id_buku = $request->judul_buku;
            $pinjaman->id_anggota = $request->nama_anggota;
            $pinjaman->tanggal_pinjam = $tanggalPinjam;
            $pinjaman->tanggal_kembali = $tanggalKembali;
            $pinjaman->save();

            return redirect()->route('pinjaman')->with('success', 'Update Data Success');
        } catch (\Exception $e) {
            return redirect()->route('edit-pinjaman')->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Peminjaman::where('id_peminjaman', $id)->delete();
            return redirect()->route('pinjaman')->with('success', 'Delete Data Success');
        } catch (\Exception $e) {
            return redirect()->route('pinjaman')->with('failed', $e->getMessage());
        }
    }
}
