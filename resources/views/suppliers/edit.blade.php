@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/suppliers/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Supplier</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('kode_pemasok') is-invalid @enderror" name="kode_pemasok" autofocus autocomplete="off" value="{{ old('kode_pemasok', $data->kode_pemasok) }}">
                    @error('kode_pemasok')
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
                <label class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_pemasok') is-invalid @enderror" name="nama_pemasok" autocomplete="off" value="{{ old('nama_pemasok', $data->nama_pemasok) }}">
                    @error('nama_pemasok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror" name="tanggal_daftar" value="{{ old('tanggal_daftar', $data->tanggal_daftar) }}">
                    @error('tanggal_daftar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telpon</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('telpon') is-invalid @enderror" name="telpon" autofocus autocomplete="off" value="{{ old('telpon', $data->telpon) }}">
                    @error('telpon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Alamat Supplier</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="alamat" name="alamat">
                        {!! old('alamat', $data->alamat) !!}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="/suppliers" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#alamat").summernote({
            height: 200,
            placeholder: 'Masukkan Deskripsi',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    });
</script>
@endsection