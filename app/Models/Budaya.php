<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}