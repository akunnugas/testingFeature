<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function wisatas()
    {
        return $this->belongsToMany(Wisata::class, 'kategori_wisata');
    }
}