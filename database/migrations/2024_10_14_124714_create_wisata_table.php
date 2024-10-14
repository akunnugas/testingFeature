<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama wisata
            $table->text('deskripsi'); // Deskripsi wisata
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wisatas');
    }
}