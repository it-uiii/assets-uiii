@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/itembrands/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode brand</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('kode_brand') is-invalid @enderror" id="kode_brand" name="kode_brand" autofocus autocomplete="off" value="{{ old('kode_brand', $data->kode_brand) }}">
                    @error('kode_brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-5 mt-2" style="color: red">
                    <span>*Kode Max 4 Digits</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Merk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_brand') is-invalid @enderror" id="nama_brand" name="nama_brand" value="{{ old('nama_brand', $data->nama_brand) }}">
                    @error('nama_brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/itembrands" class="btn btn-danger">Back</a>
        </div>
        </form>
    </div>
</div>
@endsection