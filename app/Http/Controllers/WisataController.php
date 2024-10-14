<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kategori;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::with('kategoris')->get();
        return view('wisata.index', compact('wisatas'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('wisata.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategoris' => 'required|array',
        ]);

        $wisata = Wisata::create($request->only('nama', 'deskripsi'));
        $wisata->kategoris()->attach($request->kategoris);

        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedKategoris = $wisata->kategoris->pluck('id')->toArray();

        return view('wisata.edit', compact('wisata', 'kategoris', 'selectedKategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategoris' => 'required|array',
        ]);

        $wisata = Wisata::findOrFail($id);
        $wisata->update($request->only('nama', 'deskripsi'));
        $wisata->kategoris()->sync($request->kategoris);

        return redirect()->route('wisata.index')->with('success', 'Wisata berhasil diperbarui.');
    }
}