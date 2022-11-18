@extends('layout.main')
@section('container')
<div class="col-md-8">
    <div class="card">
        <form class="form-horizontal" action="/logistics" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" autofocus autocomplete="off" value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Barang</label>
                <div class="col-2">
                    <input type="number" class="form-control @error('jumlah_item') is-invalid @enderror" name="jumlah_item" value="{{ old('jumlah_item') }}">
                    @error('jumlah_item')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <select class="form-control @error('ukuran_item') is-invalid @enderror" name="ukuran_item">
                        <option value="">Pilih</option>
                        <option value="Unit">Unit</option>
                        <option value="Set">set</option>
                        <option value="Pack">Pack</option>
                        <option value="Pcs">Pcs</option>
                    </select>
                    @error('ukuran_item')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Satuan</label>
                <div class="mt-2">
                    Rp
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control @error('nilai_perolehan') is-invalid @enderror" name="nilai_perolehan" value="{{ old('nilai_perolehan') }}">
                    @error('nilai_perolehan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_pemasok') is-invalid @enderror" name="nama_pemasok" autofocus autocomplete="off" value="{{ old('nama_pemasok') }}">
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
                    <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror" name="tanggal_daftar" value="{{ old('tanggal_daftar') }}">
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
                    <input type="number" class="form-control @error('telpon') is-invalid @enderror" name="telpon" autofocus autocomplete="off" value="{{ old('telpon') }}">
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
                        {!! old('alamat') !!}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/logistics" class="btn btn-danger">Kembali</a>
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