<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompokAktap extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_pp',
        'kode',
        'tahun',
        'bulan',
    ];

    public function item()
    {
        return $this->hasMany(items::class);
    }
}
