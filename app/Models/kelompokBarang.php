<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompokBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_kelompok',
        'kode_kelompok'
    ];

    public function item()
    {
        return $this->hasMany(items::class);
    }
}
