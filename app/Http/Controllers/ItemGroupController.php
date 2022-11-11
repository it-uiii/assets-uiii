<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use Illuminate\Http\Request;

class ItemGroupController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:golongan-list|golongan-create|golongan-edit|golongan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:golongan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:golongan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:golongan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = golongan::paginate(10);
        return view('itemgroups.index', ['title' => 'Golongan Barang', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemgroups.create', ['title' => 'Golongan Barang', 'subtitle' => 'Create']);
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
            'nama_golongan' => ['required', 'unique:golongans'],
            'kode_golongan' => ['required', 'unique:golongans', 'max:2'],
        ]);

        golongan::create($validate);
        return redirect('/itemgroups')->with('success', 'Golongan baru ditambahkan');
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
        $data = golongan::find($id);
        return view('itemgroups.edit', ['title' => 'Golongan Barang', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, golongan $itemgroup)
    {
        $validate = $request->validate([
            'nama_golongan' => ['required', 'max:100'],
            'kode_golongan' => ['required', 'max:2']
        ]);

        $itemgroup->update($validate);
        return redirect()->route('itemgroups.index')
            ->with('warning', 'Sumber berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(golongan $itemgroup)
    {
        $itemgroup->delete();
        return redirect()->route('itemgroups.index');
    }
}
