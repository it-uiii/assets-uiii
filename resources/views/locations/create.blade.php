@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <form action="/locations" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Lokasi</label>
                    <div class="col-2">
                        <input type="number" class="form-control @error('kode_lokasi') is-invalid @enderror" name="kode_lokasi" placeholder="001" autofocus autocomplete="off" value="{{ old('kode_lokasi') }}">
                        @error('kode_lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" autofocus autocomplete="off">
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <a class="btn btn-danger" href="/locations">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
