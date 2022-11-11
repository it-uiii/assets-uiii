<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\tipe;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:tipeitem-list|tipeitem-create|tipeitem-edit|tipeitem-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tipeitem-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tipeitem-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tipeitem-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipe::paginate(10);
        return view('itemtypes.index', ['title' => 'Tipe Barang', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemtypes.create', ['title' => 'Tipe Barang', 'subtitle' => 'Create']);
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
            'nama_tipe' => ['required', 'unique:tipes', 'max:100'],
            'kode_tipe' => ['required', 'max:3']
        ]);

        tipe::create($validate);
        return redirect('/itemtypes')->with('success', 'tipe barang baru berhasil ditambahkan');
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
        $data = tipe::find($id);
        return view('itemtypes.edit', ['title' => 'Tipe Barang', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipe $itemtype)
    {
        $validate = $request->validate([
            'nama_tipe' => ['required', 'max:100'],
            'kode_tipe' => ['required', 'max:3']
        ]);

        $itemtype->update($validate);
        return redirect('/itemtypes')->with('success', 'tipe barang berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipe $itemtype)
    {
        $itemtype->delete();
        return redirect()->route('itemtypes.index');
    }
}
