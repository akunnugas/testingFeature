<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriWisataTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_wisata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_wisata');
    }
}
