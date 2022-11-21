@extends('layout.main')
@section('container')
<div class="card card-info">
    <form class="form-horizontal" action="/assets" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            <label for="nm_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nm_barang" autofocus autocomplete="off" value="{{ old('nama_barang') }}" required>
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nilai Perolehan</label>
            <div class="mt-2">
                Rp
            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control @error('nilai_perolehan') is-invalid @enderror" name="nilai_perolehan" value="{{ old('nilai_perolehan') }}" required>
                @error('nilai_perolehan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jumlah Barang</label>
            <div class="col-sm-1">
                <input type="number" class="form-control @error('jumlah_item') is-invalid @enderror" name="jumlah_item" value="{{ old('jumlah_item') }}" required>
                @error('jumlah_item')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <select class="form-control @error('ukuran_item') is-invalid @enderror" name="ukuran_item" required>
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
            <label class="col-sm-2 col-form-label">Tanggal Invoice</label>
            <div class="col-sm-10">
                <input type="date" class="form-control @error('tanggal_invoice') is-invalid @enderror" name="tanggal_invoice" value="{{ old('tanggal_invoice') }}" required>
                @error('tanggal_invoice')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
                <select class="form-control @error('lokasi_id') is-invalid @enderror" name="lokasi_id" required>
                    <option value="">Pilih Lokasi</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}.{{ $area->kode_lokasi }}">{{ $area->lokasi }} - {{ $area->kode_lokasi }}</option>
                    @endforeach
                </select>
                @error('lokasi_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sumber Perolehan</label>
            <div class="col-sm-10">
                <select class="form-control @error('sumber_perolehan_id') is-invalid @enderror" name="sumber_perolehan_id" required>
                    <option value="">Pilih Sumber Perolehan</option>
                    @foreach ($sumbers as $sumber)
                        <option value="{{ $sumber->id }}.{{ $sumber->kode_sumber }}">{{ $sumber->sumber }} - {{ $sumber->kode_sumber }}</option>
                    @endforeach
                </select>
                @error('sumber_perolehan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Golongan Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('golongan_item_id') is-invalid @enderror" name="golongan_item_id" required>
                    <option value="">Pilih Golongan Barang</option>
                    @foreach ($golongans as $golongan)
                        <option value="{{ $golongan->id }}.{{ $golongan->kode_golongan }}">{{ $golongan->nama_golongan }} - {{ $golongan->kode_golongan }}</option>
                    @endforeach
                </select>
                @error('golongan_item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('jenis_item_id') is-invalid @enderror" name="jenis_item_id" required>
                    <option value="">Pilih Jenis Barang</option>
                    @foreach ($tipes as $tipe)
                        <option value="{{ $tipe->id }}.{{ $tipe->kode_tipe }}">{{ $tipe->nama_tipe }} - {{ $tipe->kode_tipe }}</option>
                    @endforeach
                </select>
                @error('jenis_item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kelompok Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('kelompok_item_id') is-invalid @enderror" name="kelompok_item_id" required>
                    <option value="">Pilih Kelompok Barang</option>
                    @foreach ($kelompoks as $kelompok)
                        <option value="{{ $kelompok->id }}.{{ $kelompok->kode_kelompok }}">{{ $kelompok->nama_kelompok }} - {{ $kelompok->kode_kelompok }}</option>
                    @endforeach
                </select>
                @error('kelompok_item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Detail Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('detailbarang_id') is-invalid @enderror" name="detailbarang_id" required>
                    <option value="">Pilih barang</option>
                    @foreach ($details as $detail)
                        <option value="{{ $detail->id }}.{{ $detail->seq_number }}">{{ $detail->detail_barang }} - {{ $detail->seq_number }}</option>
                    @endforeach
                </select>
                @error('detailbarang_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" required>
                    <option value="">Pilih Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nm_barang" class="col-sm-2 col-form-label">Lat & Long</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" name="location" required readonly>
                <div class="row">
                    <div class="col-6">
                        <div class="mt-2" id="map" name="map" style="width: 600px; height: 400px;" ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="keterangan" name="keterangan">
                    {!! old('keterangan') !!}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Umur Penyusutan Barang</label>
            <div class="col-sm-3">
                <input class="form-control" type="text" name="umur_penyusutan" placeholder="1 (nominal jangan text & itungan perbulan)">
                <span style="color: red">Hitungan pebulan</span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Image Preview</label>
            <div class="col-sm-10">
                <img class="img-preview img-fluid mb-3 col-sm-2">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Gambar</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" multiple class="custom-file-input" id="image" name="image[]" aria-describedby="image" aria-label="Upload" onchange="previewImage()">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Stock Barang</label>
            <div class="col-sm-2">
                <select class="form-control @error('stock') is-invalid @enderror" name="stock">
                    <option value="">Pilih Status</option>
                    <option value="1">Stock</option>
                    <option value="0">Off Stock</option>
                </select>
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/assets" class="btn btn-danger">Kembali</a>
    </div>
    </form>
</div>
<script>
    // script preview image
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');


        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@section('scripts')
<script>
    $(document).ready(function() {
        $("#keterangan").summernote({
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

    const map = L.map('map').setView([-6.388551, 106.861918], 16);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19
	}).addTo(map);

        var inputV = document.getElementById("location");

	function onMapClick(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        
        inputV.value = `${lat},${lng}`;

    }

	map.on('click', onMapClick);
</script>
@endsection
@endsection