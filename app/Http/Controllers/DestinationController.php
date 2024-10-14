<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Image;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('images')->get();

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destination = Destination::create($request->only(['name', 'description']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                Image::create([
                    'imageable_id' => $destination->id,
                    'imageable_type' => Destination::class,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $destination = Destination::with('images')->findOrFail($id);
        return view('destinations.edit', compact('destination'));
    }

    // Metode untuk memperbarui data destinasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $destination = Destination::findOrFail($id);
        $destination->update($request->only(['name', 'description']));

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar lama (opsional, jika Anda ingin menghapus gambar yang tidak digunakan)
            foreach ($destination->images as $image) {
                // Hapus dari penyimpanan (tambahkan logika ini sesuai kebutuhan)
                \Storage::disk('public')->delete($image->path);
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');
                Image::create([
                    'imageable_id' => $destination->id,
                    'imageable_type' => Destination::class,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil diperbarui.');
    }
}