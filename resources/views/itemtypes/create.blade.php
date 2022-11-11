@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/itemtypes" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode tipe</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('kode_tipe') is-invalid @enderror" name="kode_tipe" autofocus autocomplete="off" value="{{ old('kode_tipe') }}">
                    @error('kode_tipe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-5 mt-2" style="color: red">
                    <span>*Kode Max 2 Digits</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama tipe</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror" name="nama_tipe" autofocus autocomplete="off" value="{{ old('nama_tipe') }}">
                    @error('nama_tipe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/itemtypes" class="btn btn-danger">Back</a>
        </div>
        </form>
    </div>
</div>
@endsection