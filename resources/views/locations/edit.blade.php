@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <form action="/locations/{{ $data->id }}" method="post">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Lokasi</label>
                    <input type="text" class="form-control @error('kode_lokasi') is-invalid @enderror" id="kode_lokasi" name="kode_lokasi" value="{{ old('kode_lokasi', $data->kode_lokasi) }}">
                    @error('kode_lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $data->lokasi) }}" autofocus autocomplete="off">
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Update</button>
                <a class="btn btn-danger" href="/locations">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
