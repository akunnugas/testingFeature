<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_wisata');
    }
}