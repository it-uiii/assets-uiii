<?php

namespace App\Imports;

use App\Models\items;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new items([
            'no_inventory' => $row[1],
            'nama_barang' => $row[2],
            'tanggal_invoice' => $row[3],
            'nilai_perolehan' => $row[4],
            'lokasi_id' => $row[5],
            'jenis_item_id' => $row[6],
            'supplier_id' => $row[7],
            'sumber_perolehan_id' => $row[8],
            'golongan_item_id' => $row[9],
            'kelompok_item_id' => $row[10],
            'detailbarang_id' => $row[11],
            'user_id' => '1',

        ]);
    }
}
