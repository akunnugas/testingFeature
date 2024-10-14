<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::create(['nama' => 'Alam']);
        Kategori::create(['nama' => 'Sejarah']);
    }
}