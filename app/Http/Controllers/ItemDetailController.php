<?php

namespace App\Http\Controllers;

use App\Models\detailbarang;
use Illuminate\Http\Request;

class ItemDetailController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:detail-list|detail-create|detail-edit|detail-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:detail-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:detail-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:detail-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = detailbarang::paginate(10);
        return view('detailitems.index', ['title' => 'Detail Barang', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailitems.create', ['title' => 'Detail Barang', 'subtitle' => 'Create']);
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
            'detail_barang' => ['required', 'max:191', 'unique:detailbarangs'],
            'seq_number' => ['required', 'max:5', 'unique:detailbarangs'],
        ]);

        detailbarang::create($validate);
        return redirect('/itemdetails')->with('success', 'Detail Barang telah ditambahkan');
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
        $data = detailbarang::find($id);
        return view('detailitems.edit', ['title' => 'Detail Barang', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detailbarang $itemdetail)
    {
        $validate = $request->validate([
            'detail_barang' => ['required', 'max:191'],
            'seq_number' => ['required', 'max:5'],
        ]);

        $itemdetail->update($validate);
        return redirect('/itemdetails')->with('warning', 'Detail Barang telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(detailbarang $itemdetail)
    {
        $itemdetail->delete();
        return redirect('/itemdetails')->with('danger', 'Detail Barang telah dihapus');
    }
}
