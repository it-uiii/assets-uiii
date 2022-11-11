<?php

namespace App\Http\Controllers;

use App\Models\kelompokBarang;
use Illuminate\Http\Request;

class CategoryItemController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:kategoritem-list|kategoritem-create|kategoritem-edit|kategoritem-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:kategoritem-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kategoritem-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kategoritem-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelompokBarang::paginate(10);
        return view('itemcategories.index', ['title' => 'Kelompok Barang', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemcategories.create', ['title' => 'Kelompok Barang', 'subtitle' => 'Create']);
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
            'nama_kelompok' => ['required', 'max:100', 'unique:kelompok_barangs'],
            'kode_kelompok' => ['required', 'max:4', 'unique:kelompok_barangs']
        ]);

        kelompokBarang::create($validate);
        return redirect('/itemcategories')->with('success', 'Kelompok baru berhasil ditambahkan');
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
        $data = kelompokBarang::find($id);
        return view('itemcategories.edit', ['title' => 'Kelompok Barang', 'subtitle' => 'Create'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelompokBarang $itemcategory)
    {
        $validate = $request->validate([
            'nama_kelompok' => ['required', 'max:100'],
            'kode_kelompok' => ['required', 'max:4']
        ]);

        $itemcategory->update($validate);
        return redirect('/itemcategories')->with('warning', 'Kelompok berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelompokBarang $itemcategory)
    {
        $itemcategory->delete();
        return redirect('/itemcategories')->with('danger', 'Kelompok berhasil dihapus');
    }
}
