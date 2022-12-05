@extends('layout.main')
@section('container')
<form action="/logistics" method="post">
    @csrf
    <div class="row">
        <!--Form kiri-->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" autofocus autocomplete="off" value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">quantity</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" id="quantity" required>
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <select class="form-control @error('satuan') is-invalid @enderror" name="satuan" required>
                                <option value="">Pilih</option>
                                <option value="Pack">Box</option>
                                <option value="Pcs">Pcs</option>
                            </select>
                            @error('satuan')
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
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan" value="{{ old('harga_satuan') }}" id="harga_satuan" required>
                            @error('harga_satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> 
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="/logistics" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
        <!--kanan-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h3>Total Pajak</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('harga_bef_pajak') is-invalid @enderror" name="harga_bef_pajak" value="{{ old('harga_bef_pajak') }}" id="total" readonly>
                        </div>
                        <div class="mt-2">
                            X PPn 11% =
                        </div> 
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('harga_aft_pajak') is-invalid @enderror" name="harga_aft_pajak" value="{{ old('harga_aft_pajak') }}" id="harga_aft_pajak" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $("#quantity, #harga_satuan, #total").keyup(function() {
            var harga  = $("#harga_satuan").val();
            var jumlah = $("#quantity").val();


            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);

            var ppn = 0.11;
            var pajak = total * ppn; //11.000
            var total_aft_pajak = total + pajak;  
            var total = total_aft_pajak.toFixed();
            $("#harga_aft_pajak").val(total);
        });

    });

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