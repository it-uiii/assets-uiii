<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_barang',
        'quantity',
        'satuan',
        'harga_satuan',
        'pajak',
        'harga_bef_pajak',
        'harga_aft_pajak',
        'sisa',
        'saldo_akhir'
    ];
}
