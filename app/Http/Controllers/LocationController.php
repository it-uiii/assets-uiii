<?php

namespace App\Http\Controllers;

use App\Models\lokasi as Locations;
use App\Models\lokasi;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:location-list|location-create|location-edit|location-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:location-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:location-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:location-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $locations = Locations::where('lokasi', 'LIKE', '%' . $request->search . '%')
                ->orWhere('kode_lokasi', 'LIKE', '%' . $request->search . '%')
                ->paginate(20);
        } else {
            $locations = Locations::paginate(20);
        }
        return view('locations.index', ['title' => 'Locations', 'subtitle' => 'List'], compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create', ['title' => 'Location', 'subtitle' => 'Create']);
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
            'lokasi'        => 'required',
            'kode_lokasi'   => 'required'
        ]);

        $validate['kordinasi'] = $request->lokasi;

        lokasi::create($validate);
        return redirect('locations')->with('success', 'Lokasi baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = lokasi::find($id);
        return view('locations.edit', ['title' => 'Location', 'subtitle' => 'Edit'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $location)
    {
        $validate = $request->validate([
            'lokasi'        => 'required',
            'kode_lokasi'   => 'required'
        ]);

        $validate = $request->all();
        $validate['kordinasi'] = $request->lokasi;

        $location->update($validate);
        return redirect('locations')->with('warning', 'Lokasi telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $location)
    {
        $location->delete();
        return redirect('locations')->with('danger', 'Lokasi telah dihapus');
    }
}
