<?php

namespace App\Http\Controllers;

use App\Models\UlasanBuku;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UlasanBukuController extends Controller
{
    public function index()
    {
        $ulasanbuku = UlasanBuku::with('user', 'buku')->orderBy('id', 'desc')->get();
        return view('ulasan_buku.index', compact('ulasanbuku'));
    }

    public function input()
    {
        return view('ulasan_buku.formInput');
    }

    public function store(Request $request)
    {
        // Validasi form sebelum menyimpan data
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'ulasan' => 'required', // Pastikan kolom ulasan tidak boleh kosong
            'rating' => 'required',
        ]);

        // Buat data ulasan buku baru
        UlasanBuku::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ]);

        return redirect()->route('ulasan_buku')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $ulasanbuku = UlasanBuku::findOrFail($id);
        return view('ulasan_buku.formEdit', compact('ulasanbuku'));
    }

    public function update(Request $request, $id)
    {
        // Validasi form sebelum menyimpan data
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'ulasan' => 'required', // Pastikan kolom ulasan tidak boleh kosong
            'rating' => 'required',
        ]);

        // Perbarui data ulasan buku yang ada
        $ulasanbuku = UlasanBuku::findOrFail($id);
        $ulasanbuku->update($request->all());

        return redirect()->route('ulasan_buku')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $ulasanbuku = UlasanBuku::findOrFail($id);
        $ulasanbuku->delete();

        return redirect()->route('ulasan_buku')->with('success', 'Data berhasil dihapus');
    }
}
