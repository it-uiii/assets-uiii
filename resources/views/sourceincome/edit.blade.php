@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/sourceincome/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Sumber</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('kode_sumber') is-invalid @enderror" id="kode_sumber" name="kode_sumber" autofocus autocomplete="off" value="{{ old('kode_sumber', $data->kode_sumber) }}">
                    @error('kode_sumber')
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
                <label class="col-sm-2 col-form-label">Nama sumber</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber" value="{{ old('sumber', $data->sumber) }}">
                    @error('sumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/sourceincome" class="btn btn-danger">Back</a>
        </div>
        </form>
    </div>
</div>
@endsection