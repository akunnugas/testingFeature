<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_wisata', function (Blueprint $table) {
            if (!Schema::hasTable('kategori_wisata')) {
                $table->id();
                $table->foreignId('wisata_id')->constrained()->onDelete('cascade');
                $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            }
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_wisata');
    }
};
