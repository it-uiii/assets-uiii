<?php

namespace App\Http\Controllers;

use App\Models\tipe;
use App\Models\items;
use App\Models\lokasi;
use App\Models\sumber;
use App\Models\golongan;
use App\Models\brandItem;
use App\Models\dataUnit;
use App\Models\detailbarang;
use App\Models\kelompokAktap;
use Illuminate\Http\Request;
use App\Models\kelompokBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemsManagementController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:asset-list|asset-create|asset-edit|asset-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:asset-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:asset-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:asset-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $items = items::where('no_inventory', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nama_barang', 'LIKE', '%' . $request->search . '%')
                ->orderBy('no_inventory', 'asc')
                ->paginate(20);
        } else {
            $items = items::orderBy('no_inventory', 'asc')->paginate(20);
        }

        return view('assets.index', ['title' => 'Assets', 'subtitle' => 'List'], compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas      = lokasi::all();
        $sumbers    = sumber::all();
        $golongans  = golongan::all();
        $tipes      = tipe::all();
        $kelompoks  = kelompokBarang::all();
        $brands     = brandItem::all();
        $details    = detailbarang::all();
        $aktap      = kelompokAktap::all();
        $units      = dataUnit::all();
        return view(
            'assets.create',
            ['title' => 'Assets', 'subtitle' => 'Create'],
            compact(
                'areas',
                'sumbers',
                'golongans',
                'tipes',
                'kelompoks',
                'brands',
                'details',
                'aktap',
                'units'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang'           => ['required', 'string', 'max:255'],
            'nilai_perolehan'       => ['required', 'max:255'],
            'jumlah_item'           => ['required'],
            'total'                 => ['required', 'integer'],
            'tanggal_invoice'       => ['required', 'date'],
            'kelompok_aktap_id'     => ['required'],
            'data_unit_id'          => ['required'],
            'lokasi_id'             => ['required'],
            'sumber_perolehan_id'   => ['required'],
            'golongan_item_id'      => ['required'],
            'jenis_item_id'         => ['required'],
            'kelompok_item_id'      => ['required'],
            'image.*'               => ['image', 'mimes:png,jpg,jpeg,JPG,JPEG'],
            'location'              => ['required'],
        ]);

        // if ($request->file('image')) {
        //     $data['image'] = $request->file('image')->store('assets-img');
        // }

        if ($request->image) {
            foreach ($request->image as $image) {
                $data['image']   = $image->storeAs('public/asset-img', $image->getClientOriginalName());
            }
        }

        $lokasi = explode(".", $request->lokasi_id);
        $id_lokasi = $lokasi[0];
        $kode_lokasi = $lokasi[1];
        $data['lokasi_id'] = $id_lokasi;

        $sumber_perolehan = explode(".", $request->sumber_perolehan_id);
        $id_sumber = $sumber_perolehan[0];
        $kode_sumber = $sumber_perolehan[1];
        $data['sumber_perolehan_id'] = $id_sumber;

        $golongan = explode(".", $request->golongan_item_id);
        $id_golongan = $golongan[0];
        $kode_golongan = $golongan[1];
        $data['golongan_item_id'] = $id_golongan;

        $jenis = explode(".", $request->jenis_item_id);
        $id_jenis = $jenis[0];
        $kode_jenis = $jenis[1];
        $data['jenis_item_id'] = $id_jenis;

        $kelompok = explode(".", $request->kelompok_item_id);
        $id_kelompok = $kelompok[0];
        $kode_kelompok = $kelompok[1];
        $data['kelompok_item_id'] = $id_kelompok;

        $location = explode(",", $request->location);
        $lat = $location[0];
        $lng = $location[1];
        $data['latitude'] = $lat;
        $data['longitude'] = $lng;


        $myDate = date('Y');
        $year = substr($myDate, 2);

        $data['nama_barang']        = $request->nama_barang;
        $data['nilai_perolehan']    = $request->nilai_perolehan;
        $data['total']              = $request->total;
        $data['kelompok_aktap_id']  = $request->kelompok_aktap_id;
        $data['data_unit_id']       = $request->data_unit_id;
        $data['brand_id']           = $request->brand_id;
        $data['keterangan']         = $request->keterangan;
        $data['umur_penyusutan']    = $request->umur_penyusutan;
        $data['tanggal_invoice']    = $request->tanggal_invoice;
        $data['user_id']            = auth()->user()->id;
        $data['flag']               = 0;
        $data['lantai']             = $request->lantai;
        $data['ruangan']            = $request->ruangan;

        for ($i = 1; $i <= $request->jumlah_item; $i++) {
            $no_laporan = Str::padLeft($i, 5, '0');
            $data['no_inventory']       = 'UIII' . $kode_lokasi . $kode_sumber . $kode_golongan . $kode_jenis . $kode_kelompok . $year . $no_laporan;

            items::create($data);
        }
        return redirect('/assets')->with('success', 'barang baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $items, $id)
    {
        $item = items::find($id);
        return view('assets.show', ['title' => 'Asset', 'subtitle' => 'Show'], compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(items $items, $id)
    {
        $areas      = lokasi::all();
        $sumbers    = sumber::all();
        $golongans  = golongan::all();
        $tipes      = tipe::all();
        $kelompoks  = kelompokBarang::all();
        $brands     = brandItem::all();
        $details    = detailbarang::all();
        $aktap      = kelompokAktap::all();
        $units      = dataUnit::all();
        $data = items::find($id);
        return view('assets.edit', ['title' => 'Asset', 'subtitle' => 'Edit'], compact(
            'areas',
            'sumbers',
            'golongans',
            'tipes',
            'kelompoks',
            'brands',
            'details',
            'aktap',
            'units',
            'data'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, items $asset)
    {
        $rules = [
            'nama_barang' => 'required|string|max:255',
            'nilai_perolehan' => 'required|max:255',
            'jumlah_item' => 'required',
            'tanggal_invoice' => 'required|date',
            'lokasi_id' => 'required',
            'sumber_perolehan_id' => 'required',
            'golongan_item_id' => 'required',
            'jenis_item_id' => 'required',
            'kelompok_item_id' => 'required',
            'image.*' => 'image|mimes:png,jpg,jpeg,JPG,JPEG'
        ];

        $data = $request->validate($rules);

        if ($request->image) {
            if ($request->oldCover) {
                Storage::delete($request->oldCover);
            }
            foreach ($request->image as $image) {
                $data['image']   = $image->storeAs('public/asset-img', $image->getClientOriginalName());
            }
        }

        $lokasi = explode(".", $request->lokasi_id);
        $id_lokasi = $lokasi[0];
        $kode_lokasi = $lokasi[1];
        $data['lokasi_id'] = $id_lokasi;


        $sumber_perolehan = explode(".", $request->sumber_perolehan_id);
        $id_sumber = $sumber_perolehan[0];
        $kode_sumber = $sumber_perolehan[1];
        $data['sumber_perolehan_id'] = $id_sumber;

        $golongan = explode(".", $request->golongan_item_id);
        $id_golongan = $golongan[0];
        $kode_golongan = $golongan[1];
        $data['golongan_item_id'] = $id_golongan;

        $jenis = explode(".", $request->jenis_item_id);
        $id_jenis = $jenis[0];
        $kode_jenis = $jenis[1];
        $data['jenis_item_id'] = $id_jenis;

        $kelompok = explode(".", $request->kelompok_item_id);
        $id_kelompok = $kelompok[0];
        $kode_kelompok = $kelompok[1];
        $data['kelompok_item_id'] = $id_kelompok;

        $location = explode(",", $request->location);
        $lat = $location[0];
        $lng = $location[1];
        $data['latitude'] = $lat;
        $data['longitude'] = $lng;

        $myDate = date('Y');
        $year = substr($myDate, 2);

        $data['nama_barang']        = $request->nama_barang;
        $data['nilai_perolehan']    = $request->nilai_perolehan;
        $data['total']              = $request->total;
        $data['kelompok_aktap_id']  = $request->kelompok_aktap_id;
        $data['data_unit_id']       = $request->data_unit_id;
        $data['brand_id']           = $request->brand_id;
        $data['keterangan']         = $request->keterangan;
        $data['umur_penyusutan']    = $request->umur_penyusutan;
        $data['stock']              = $request->stock;
        $data['tanggal_invoice']    = $request->tanggal_invoice;
        $data['user_id']            = auth()->user()->id;
        // substr seq_number variable substr("UIII043209972200001",14)
        $data['no_inventory']       = 'UIII' . $kode_lokasi . $kode_sumber . $kode_golongan . $kode_jenis . $kode_kelompok . $year;

        $asset->update($data);
        return redirect()->route('assets.index')
            ->with('warning', 'asset berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(items $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index');
    }

    public function import()
    {
    }
}
