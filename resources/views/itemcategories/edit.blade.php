@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/itemcategories/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode kelompok</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('kode_kelompok') is-invalid @enderror" id="kode_kelompok" name="kode_kelompok" autofocus autocomplete="off" value="{{ old('kode_kelompok', $data->kode_kelompok) }}">
                    @error('kode_kelompok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-5 mt-2" style="color: red">
                    <span>*Kode Max 3 Digits</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama kelompok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_kelompok') is-invalid @enderror" id="nama_kelompok" name="nama_kelompok" value="{{ old('nama_kelompok', $data->nama_kelompok) }}">
                    @error('nama_kelompok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/itemcategories" class="btn btn-danger">Back</a>
        </div>
        </form>
    </div>
</div>
@endsection