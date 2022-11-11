@extends('layout.main')
@section('container')
<div class="card card-info">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">No Inventori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->no_inventory }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->nama_barang }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nilai Perolehan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="Rp {{ $item->nilai_perolehan }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->jumlah_item }} {{ $item->ukuran_item }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Tanggal Invoice</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{ $item->tanggal_invoice }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->lokasi->lokasi }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Sumber Perolehan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->sumberItem->sumber }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Golongan Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->golonganItem->nama_golongan }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Jenis Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->tipeItem->nama_tipe }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Kelompok Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->kelompokItem->nama_kelompok }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Pemasok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->supplier->nama_pemasok }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $item->brand->nama_brand }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" disabled>
                    {!! $item->keterangan !!}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Umur Penyusutan Barang</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" disabled>
                    {!! $item->umur_penyusutan !!}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Image Preview</label>
            <div class="col-sm-10">
                @if (empty($item->image))
                    No Image
                @else
                    <img style="max-width: 200px" class="img-fluid" src="{{ asset('storage/'. $item->image) }}" alt="{{ $item->image }}">
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Stock Barang</label>
            <div class="col-sm-10">
                @if ($item->stock == 1)
                    <input type="text" class="form-control" value="Stock Tersedia" readonly>
                @else
                    <input type="text" class="form-control" value="Stock Kosong" readonly>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-warning" href="/assets/{{ $item->id }}/edit">
            Edit
        </a>
        <a href="/assets" class="btn btn-danger">Kembali</a>
    </div>
</div>
@endsection