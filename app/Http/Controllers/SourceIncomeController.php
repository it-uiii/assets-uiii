<?php

namespace App\Http\Controllers;

use App\Models\sumber;
use Illuminate\Http\Request;

class SourceIncomeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:sumber-list|sumber-create|sumber-edit|sumber-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:sumber-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sumber-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sumber-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = sumber::paginate(10);
        return view('sourceincome.index', ['title' => 'Source Income', 'subtitle' => 'Show all'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sourceincome.create', ['title' => 'Source Income', 'subtitle' => 'Create']);
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
            'sumber' => ['required', 'max:100', 'unique:sumbers'],
            'kode_sumber' => ['required', 'max:2', 'unique:sumbers']
        ]);

        sumber::create($validate);
        return redirect('/sourceincome')->with('success', 'Sumber baru ditambahkan');
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
        $data = sumber::find($id);
        return view('sourceincome.edit', ['title' => 'Source Income', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sumber $sourceincome)
    {
        $validate = $request->validate([
            'sumber' => ['required', 'max:100'],
            'kode_sumber' => ['required', 'max:2']
        ]);

        $sourceincome->update($validate);
        return redirect()->route('sourceincome.index')
            ->with('warning', 'Sumber berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sumber $sourceincome)
    {
        $sourceincome->delete();
        return redirect()->route('sourceincome.index');
    }
}
