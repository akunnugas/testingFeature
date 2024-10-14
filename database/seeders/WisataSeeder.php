<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    public function run()
    {
        Wisata::create(['nama' => 'Pantai Kuta', 'deskripsi' => 'Pantai indah di Bali.']);
        Wisata::create(['nama' => 'Gunung Bromo', 'deskripsi' => 'Gunung berapi yang terkenal.']);
    }
}