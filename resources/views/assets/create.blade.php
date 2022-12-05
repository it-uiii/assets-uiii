@extends('layout.main')
@section('container')
    <form class="form-horizontal" action="/assets" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nm_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    name="nama_barang" id="nm_barang" autofocus autocomplete="off"
                                    value="{{ old('nama_barang') }}" required>
                                @error('nama_barang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nilai Perolehan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nilai_perolehan') is-invalid @enderror"
                                    name="nilai_perolehan" value="{{ old('nilai_perolehan') }}" id="nilai_perolehan"
                                    required>
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
                                <input type="number" class="form-control @error('jumlah_item') is-invalid @enderror"
                                    name="jumlah_item" value="{{ old('jumlah_item') }}" id="jumlah_item" required>
                                @error('jumlah_item')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('total') is-invalid @enderror"
                                    name="total" value="{{ old('total') }}" id="total" required readonly>
                                @error('total')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kelompok Aktap</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('kelompok_aktap_id') is-invalid @enderror"
                                    name="kelompok_aktap_id" id="kelompok_aktap" required>
                                    <option value="">Choose Aktap</option>
                                    @foreach ($aktap as $item)
                                        @if (old('kelompok_aktap_id') == $item->id)
                                            <option value="{{ $item->id }}" data-year="{{ $item->tahun }}"
                                                data-month={{ $item->bulan }} selected>{{ $item->nama_pp }} -
                                                {{ $item->kode }}</option>
                                        @else
                                            <option value="{{ $item->id }}" data-year="{{ $item->tahun }}"
                                                data-month={{ $item->bulan }}>{{ $item->nama_pp }} - {{ $item->kode }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kelompok_aktap_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Umur [Bulan]</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="bulan" readonly>
                            </div>
                            <label class="col-form-label">% Susut [Tahun]</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" id="umur_penyusutan" name="umur_penyusutan"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Perolehan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('tanggal_invoice') is-invalid @enderror"
                                    name="tanggal_invoice" value="{{ old('tanggal_invoice') }}" required>
                                @error('tanggal_invoice')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id"
                                    required>
                                    <option value="">Choose Brand</option>
                                    @foreach ($brands as $brand)
                                        @if (old('brand_id') == $brand->id)
                                            <option value="{{ $brand->id }}" selected>{{ $brand->nama_brand }}</option>
                                        @else
                                            <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
                                        @endif
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
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="keterangan" name="keterangan">
                                {!! old('keterangan') !!}
                            </textarea>
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
                                    <input type="file" multiple class="custom-file-input" id="image"
                                        name="image[]" aria-describedby="image" aria-label="Upload"
                                        onchange="previewImage()">
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
                                    <option value="">Choose Status</option>
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
                </div>
            </div>
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">No Inventory</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nm_barang" class="col-sm-2 col-form-label">No Inventory</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('no_inventory') is-invalid @enderror"
                                    value="{{ old('no_inventory') }}" id="no_inventory" required readonly>
                                @error('no_inventory')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('lokasi_id') is-invalid @enderror" name="lokasi_id"
                                    id="lokasi" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose Lokasi</option>
                                    @foreach ($areas as $area)
                                    @if (old('lokasi_id') == $area->id)
                                    <option value="{{ $area->id }}.{{ $area->kode_lokasi }}"
                                        data-lokasi="{{ $area->kode_lokasi }}" selected>{{ $area->lokasi }} -
                                        {{ $area->kode_lokasi }}
                                    </option>
                                    @else
                                    <option value="{{ $area->id }}.{{ $area->kode_lokasi }}"
                                        data-lokasi="{{ $area->kode_lokasi }}">{{ $area->lokasi }} -
                                        {{ $area->kode_lokasi }}
                                    </option>
                                    @endif
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
                                <select class="form-control @error('sumber_perolehan_id') is-invalid @enderror"
                                    name="sumber_perolehan_id" id="sumber_perolehan" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose Sumber Perolehan</option>
                                    @foreach ($sumbers as $sumber)
                                    @if (old('sumber_perolehan_id') == $sumber->id)
                                    <option value="{{ $sumber->id }}.{{ $sumber->kode_sumber }}"
                                        data-sumber="{{ $sumber->kode_sumber }}" selected>{{ $sumber->sumber }} -
                                        {{ $sumber->kode_sumber }}
                                    </option>
                                    @else
                                    <option value="{{ $sumber->id }}.{{ $sumber->kode_sumber }}"
                                        data-sumber="{{ $sumber->kode_sumber }}">{{ $sumber->sumber }} -
                                        {{ $sumber->kode_sumber }}
                                    </option>
                                    @endif
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
                                <select class="form-control @error('golongan_item_id') is-invalid @enderror"
                                    name="golongan_item_id" id="golongan_item" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose Golongan Barang</option>
                                    @foreach ($golongans as $golongan)
                                    @if (old('golongan_id') == $golongan->id)
                                    <option value="{{ $golongan->id }}.{{ $golongan->kode_golongan }}"
                                        data-golongan="{{ $golongan->kode_golongan }}" selected>{{ $golongan->nama_golongan }}
                                        - {{ $golongan->kode_golongan }}
                                    </option>
                                    @else
                                    <option value="{{ $golongan->id }}.{{ $golongan->kode_golongan }}"
                                        data-golongan="{{ $golongan->kode_golongan }}">{{ $golongan->nama_golongan }}
                                        - {{ $golongan->kode_golongan }}
                                    </option>   
                                    @endif
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
                                <select class="form-control @error('jenis_item_id') is-invalid @enderror"
                                    name="jenis_item_id" id="jenis_item" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose Jenis Barang</option>
                                    @foreach ($tipes as $tipe)
                                    @if (old('jenis_item_id') == $tipe->id)
                                    <option value="{{ $tipe->id }}.{{ $tipe->kode_tipe }}"
                                        data-tipe="{{ $tipe->kode_tipe }}">{{ $tipe->nama_tipe }} -
                                        {{ $tipe->kode_tipe }}
                                    </option>
                                    @else
                                    <option value="{{ $tipe->id }}.{{ $tipe->kode_tipe }}"
                                        data-tipe="{{ $tipe->kode_tipe }}" selected>{{ $tipe->nama_tipe }} -
                                        {{ $tipe->kode_tipe }}
                                    </option>
                                    @endif
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
                                <select class="form-control @error('kelompok_item_id') is-invalid @enderror"
                                    name="kelompok_item_id" id="kelompok_item" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose Kelompok Barang</option>
                                    @foreach ($kelompoks as $kelompok)
                                    @if (old('kelompok_item_id') == $kelompok->id)
                                    <option value="{{ $kelompok->id }}.{{ $kelompok->kode_kelompok }}"
                                        data-kelompok="{{ $kelompok->kode_kelompok }}" selected>{{ $kelompok->nama_kelompok }}
                                        - {{ $kelompok->kode_kelompok }}
                                    </option>
                                    @else
                                    <option value="{{ $kelompok->id }}.{{ $kelompok->kode_kelompok }}"
                                        data-kelompok="{{ $kelompok->kode_kelompok }}">{{ $kelompok->nama_kelompok }}
                                        - {{ $kelompok->kode_kelompok }}
                                    </option>  
                                    @endif
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
                                <select class="form-control @error('detailbarang_id') is-invalid @enderror"
                                    name="detailbarang_id" id="detailbarang" required onchange="getOptionAttr()">
                                    <option value="" disabled>Choose barang</option>
                                    @foreach ($details as $detail)
                                    @if (old('detailbarang_id') == $detail->id)
                                    <option value="{{ $detail->id }}.{{ $detail->seq_number }}"
                                        data-sequence="{{ $detail->seq_number }}" selected>{{ $detail->detail_barang }} -
                                        {{ $detail->seq_number }}
                                    </option>
                                    @else
                                    <option value="{{ $detail->id }}.{{ $detail->seq_number }}"
                                        data-sequence="{{ $detail->seq_number }}">{{ $detail->detail_barang }} -
                                        {{ $detail->seq_number }}
                                    </option>  
                                    @endif
                                    @endforeach
                                </select>
                                @error('detailbarang_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nm_barang" class="col-sm-2 col-form-label">Lat & Long</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="location" name="location" required
                                    readonly>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mt-2" id="map" name="map"
                                            style="width: 600px; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        // script preview image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');


            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }



        document.querySelector('#kelompok_aktap').addEventListener('change', (e) => {
            const month = e.target.selectedOptions[0].dataset.month
            document.querySelector('#bulan').value = `${month}`
        });

        document.querySelector('#kelompok_aktap').addEventListener('change', (e) => {
            const year = e.target.selectedOptions[0].dataset.year
            var total = 100 / year;
            // console.log(total);
            document.querySelector('#umur_penyusutan').value = `${total}`
        });
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

            $("#nilai_perolehan, #jumlah_item, #total").keyup(function() {
                var harga = $("#nilai_perolehan").val();
                var jumlah = $("#jumlah_item").val();


                var total = parseInt(harga) * parseInt(jumlah);
                $("#total").val(total);
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
