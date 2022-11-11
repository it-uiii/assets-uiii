@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/itemdetails/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. urut</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('seq_number') is-invalid @enderror" id="seq_number" name="seq_number" autofocus autocomplete="off" value="{{ old('seq_number', $data->seq_number) }}">
                    @error('seq_number')
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
                <label class="col-sm-2 col-form-label">Detail barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('detail_barang') is-invalid @enderror" id="detail_barang" name="detail_barang" value="{{ old('detail_barang', $data->detail_barang) }}">
                    @error('detail_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/itemdetails" class="btn btn-danger">Back</a>
        </div>
        </form>
    </div>
</div>
@endsection