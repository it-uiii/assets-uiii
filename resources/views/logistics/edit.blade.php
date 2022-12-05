@extends('layout.main')
@section('container')
    <form action="/logistics/{{ $data->id }}" method="post">
    @csrf
    @method('put')
    <div class="row">
        <!--Form kiri-->
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" autofocus autocomplete="off" value="{{ old('nama_barang', $data->nama_barang) }}" required>
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
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $data->quantity) }}" id="quantity" required>
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <select class="form-control @error('satuan') is-invalid @enderror" name="satuan" required>
                                <option value="">Pilih</option>
                                <option value="{{ $data->satuan }}" selected>{{ $data->satuan }}</option>
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
                            <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" name="harga_satuan" value="{{ old('harga_satuan', $data->harga_satuan) }}" id="harga_satuan" required>
                            @error('harga_satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> 
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
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
                            <input type="number" class="form-control @error('harga_bef_pajak') is-invalid @enderror" name="harga_bef_pajak" value="{{ old('harga_bef_pajak', $data->harga_bef_pajak) }}" id="total" readonly>
                        </div>
                        <div class="mt-2">
                            X PPn 11% =
                        </div> 
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('harga_aft_pajak') is-invalid @enderror" name="harga_aft_pajak" value="{{ old('harga_aft_pajak', $data->harga_aft_pajak) }}" id="harga_aft_pajak" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3>Stock</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sisa</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('sisa') is-invalid @enderror" name="sisa" value="{{ old('sisa', $data->sisa) }}" id="sisa">
                        </div>
                        <div class="mt-2">
                            -
                        </div> 
                        <div class="col-sm-3">
                            <input type="number" class="form-control @error('saldo_akhir') is-invalid @enderror" name="saldo_akhir" value="{{ old('saldo_akhir', $data->saldo_akhir) }}" id="saldo">
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
        var qty = <?php echo json_encode($data->quantity)?>;
        var after_pajak = <?php echo json_encode($data->harga_aft_pajak) ?>;

        $("#quantity, #harga_satuan, #total, #sisa, #saldo_akhir, #saldo").keyup(function() {
            var harga  = $("#harga_satuan").val();
            var jumlah = $("#quantity").val();
            var sisa = $("#sisa").val();
            var saldo_akhir = $("#saldo_akhir").val();
            var saldo = $("#saldo").val();

            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);

            var ppn = 0.11;
            var pajak = total * ppn;
            var total_aft_pajak = total + pajak;  
            var total = total_aft_pajak.toFixed();
            $("#harga_aft_pajak").val(total);

            var a = sisa * harga;
            var b = sisa * harga * ppn; //9000
            
            // console.log(a);

            var saldo = b + a;
            $("#saldo").val(saldo);
        });

    });
</script>
@endsection