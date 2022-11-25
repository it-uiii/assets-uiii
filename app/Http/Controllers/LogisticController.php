<?php

namespace App\Http\Controllers;

use App\Models\logistik;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = logistik::paginate(20);
        return view('logistics.index', ['title' => 'Logistics', 'subtitle' => 'All'], compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logistics.create', ['title' => 'Logistics', 'subtitle' => 'Create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'nama_barang'       => ['required', 'max:255'],
            'quantity'          => ['required', 'integer'],
            'satuan'            => ['required'],
            'harga_satuan'      => ['required', 'integer'],
            'harga_bef_pajak'   => ['required', 'integer'],
            'harga_aft_pajak'   => ['required', 'integer']
        ]);

        logistik::create($data);
        return redirect('logistics')->with('success', 'Logistik baru ditambahkan');
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
        $data = logistik::find($id);
        return view('logistics.edit', ['title' => 'Logistics', 'subtitle' => 'All'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, logistik $logistic)
    {
        $data = $request->validate([
            'nama_barang'       => ['required', 'max:255'],
            'quantity'          => ['required', 'integer'],
            'satuan'            => ['required'],
            'harga_satuan'      => ['required', 'integer'],
            'harga_bef_pajak'   => ['required', 'integer'],
            'harga_aft_pajak'   => ['required', 'integer']
        ]);

        // $data['quantity'] = $request->quantity - $request->sisa;
        $data['sisa'] = $request->sisa;
        $data['saldo_akhir'] = $request->saldo_akhir;

        $logistic->update($data);
        return redirect('logistics')->with('warning', 'Logistik telah berubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(logistik $logistic)
    {
        $logistic->delete();
        return redirect('logistics')->with('danger', 'Merk telah dihapus');
    }
}
