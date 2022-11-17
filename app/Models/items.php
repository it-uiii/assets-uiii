<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'id',
    //     'nama_barang',
    //     'nilai_perolehan',
    //     'jumlah_item',
    //     'ukuran_item',
    //     'tanggal_invoice',
    //     'lokasi_id',
    //     'sumber_perolehan_id',
    //     'golongan_item_id',
    //     'jenis_item_id',
    //     'kelompok_item_id',
    //     'detailbarang_id',
    //     'supplier_id',
    //     'brand_id',
    //     'stock',
    //     'image',
    //     'umur_penyusutan',
    //     'user_id',
    //     'no_inventory'

    // ];

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class);
    }

    public function sumberItem()
    {
        return $this->belongsTo(sumber::class, 'sumber_perolehan_id');
    }

    public function golonganItem()
    {
        return $this->belongsTo(golongan::class, 'golongan_item_id');
    }

    public function tipeItem()
    {
        return $this->belongsTo(tipe::class, 'jenis_item_id');
    }

    public function kelompokItem()
    {
        return $this->belongsTo(kelompokBarang::class, 'kelompok_item_id');
    }

    // public function supplier()
    // {
    //     return $this->belongsTo(supplier::class, 'supplier_id');
    // }

    public function brand()
    {
        return $this->belongsTo(brandItem::class, 'brand_id');
    }

    public function detail()
    {
        return $this->belongsTo(detailbarang::class, 'detailbarang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
