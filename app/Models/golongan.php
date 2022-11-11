<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_golongan',
        'nama_golongan'
    ];

    public function item()
    {
        return $this->hasMany(items::class);
    }
}
