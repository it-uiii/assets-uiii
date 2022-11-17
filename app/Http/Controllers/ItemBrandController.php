<?php

namespace App\Http\Controllers;

use App\Models\brandItem;
use Illuminate\Http\Request;

class ItemBrandController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = brandItem::paginate(10);
        return view('itembrands.index', ['title' => 'Brand Barang', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itembrands.create', ['title' => 'Brand Barang', 'subtitle' => 'Create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_brand' => ['required', 'max:191'],
            'kode_brand' => ['required', 'max:4', 'unique:brand_items']
        ]);

        brandItem::create($validate);
        return redirect('itembrands')->with('success', 'Merk baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = brandItem::find($id);
        return view('itembrands.edit', ['title' => 'Brand Barang', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brandItem $itembrand)
    {
        $validate = $request->validate([
            'nama_brand' => ['required', 'max:191'],
            'kode_brand' => ['required', 'max:4']
        ]);

        $itembrand->update($validate);
        return redirect('itembrands')->with('warning', 'Merk telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(brandItem $itembrand)
    {
        $itembrand->delete();
        return redirect('itembrands')->with('danger', 'Merk telah dihapus');
    }
}
