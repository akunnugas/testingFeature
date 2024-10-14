<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string',
        ]);

        // Simpan lokasi ke database
        Location::create($validated);

        return response()->json(['message' => 'Lokasi berhasil disimpan']);
    }
}