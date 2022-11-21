@extends('layout.main')
@section('container')
<div class="card card-info">
    <form class="form-horizontal" action="{{ route('assets.update', $data) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group row">
            <label for="nm_barang" class="col-sm-2 col-form-label">No Inventory</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $data->no_inventory }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="nm_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nm_barang" autofocus autocomplete="off" value="{{ old('nama_barang', $data->nama_barang) }}">
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Nilai Perolehan</label>
            <div class="mt-2">
                Rp
            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control @error('nilai_perolehan') is-invalid @enderror" name="nilai_perolehan" value="{{ old('nilai_perolehan', $data->nilai_perolehan) }}">
                @error('nilai_perolehan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Jumlah Barang</label>
            <div class="col-sm-1">
                <input type="number" class="form-control @error('jumlah_item') is-invalid @enderror" name="jumlah_item" value="{{ old('jumlah_item', $data->jumlah_item) }}">
                @error('jumlah_item')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <select class="form-control @error('ukuran_item') is-invalid @enderror" name="ukuran_item">
                    <option value="">Pilih</option>
                    <option value="{{ $data->ukuran_item }}" selected>{{ $data->ukuran_item }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Tanggal Invoice</label>
            <div class="col-sm-10">
                <input type="date" class="form-control @error('tanggal_invoice') is-invalid @enderror" name="tanggal_invoice" value="{{ old('tanggal_invoice', $data->tanggal_invoice) }}">
                @error('tanggal_invoice')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
                <select class="form-control @error('lokasi_id') is-invalid @enderror" name="lokasi_id">
                    <option value="">Pilih Lokasi</option>
                    @foreach ($areas as $area)
                        @if ($data->lokasi_id)
                            <option value="{{ $area->id }}.{{ $area->kode_lokasi }}" selected>{{ $area->lokasi }}</option>
                        @else
                            <option value="{{ $area->id }}.{{ $area->kode_lokasi }}">{{ $area->lokasi }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Sumber Perolehan</label>
            <div class="col-sm-10">
                <select class="form-control @error('sumber_perolehan_id') is-invalid @enderror" name="sumber_perolehan_id">
                    <option value="">Pilih Sumber Perolehan</option>
                    @foreach ($sumbers as $sumber)
                        @if ($data->sumber_perolehan_id)
                            <option value="{{ $sumber->id }}.{{ $sumber->kode_sumber }}" selected>{{ $sumber->sumber }}</option>
                        @else
                            <option value="{{ $sumber->id }}.{{ $sumber->kode_sumber }}">{{ $sumber->sumber }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Golongan Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('golongan_item_id') is-invalid @enderror" name="golongan_item_id">
                    <option value="">Pilih Golongan Barang</option>
                    @foreach ($golongans as $golongan)
                        @if ($data->golongan_item_id)
                            <option value="{{ $golongan->id }}.{{ $golongan->kode_golongan }}" selected>{{ $golongan->nama_golongan }}</option>
                        @else
                            <option value="{{ $golongan->id }}.{{ $golongan->kode_golongan }}">{{ $golongan->nama_golongan }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Jenis Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('jenis_item_id') is-invalid @enderror" name="jenis_item_id">
                    <option value="">Pilih Jenis Barang</option>
                    @foreach ($tipes as $tipe)
                        @if ($data->jenis_item_id)
                            <option value="{{ $tipe->id }}.{{ $tipe->kode_tipe }}" selected>{{ $tipe->nama_tipe }}</option>
                        @else
                            <option value="{{ $tipe->id }}.{{ $tipe->kode_tipe }}">{{ $tipe->nama_tipe }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Kelompok Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('kelompok_item_id') is-invalid @enderror" name="kelompok_item_id">
                    <option value="">Pilih Kelompok Barang</option>
                    @foreach ($kelompoks as $kelompok)
                        @if ($data->kelompok_item_id)
                            <option value="{{ $kelompok->id }}.{{ $kelompok->kode_kelompok }}" selected>{{ $kelompok->nama_kelompok }}</option>
                        @else
                            <option value="{{ $kelompok->id }}.{{ $kelompok->kode_kelompok }}">{{ $kelompok->nama_kelompok }}</option>
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
            <label for="" class="col-sm-2 col-form-label">Detail Barang</label>
            <div class="col-sm-10">
                <select class="form-control @error('detailbarang_id') is-invalid @enderror" name="detailbarang_id">
                    <option value="">Pilih barang</option>
                    @foreach ($details as $detail)
                        @if ($data->detailbarang_id)
                            <option value="{{ $detail->id }}.{{ $detail->seq_number }}" selected>{{ $detail->detail_barang }}</option>
                        @else
                            <option value="{{ $detail->id }}.{{ $detail->seq_number }}">{{ $detail->detail_barang }}</option>
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
        {{-- <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Pemasok</label>
            <div class="col-sm-10">
                <select class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id">
                    <option value="">Pilih Pemasok</option>
                    @foreach ($suppliers as $supplier)
                        @if ($data->supplier_id)
                            <option value="{{ $supplier->id }}" selected>{{ $supplier->nama_pemasok }}</option>
                        @else
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_pemasok }}</option>
                        @endif
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div> --}}
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                    <option value="">Pilih Brand</option>
                    @foreach ($brands as $brand)
                        @if ($data->brand_id)
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
            <label for="nm_barang" class="col-sm-2 col-form-label">Latitude & Longitude</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-3">
                        <input type="text" class="form-control" placeholder="Latitude" id="latitude" name="latitude" value="{{ old('latitude', $data->latitude) }}" required>
                    </div>
                    ,
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Longitude" id="longitude" name="longitude" value="{{ old('longitude', $data->longitude) }}" required>
                    </div>
                </div>
                @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @error('longitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="keterangan" name="keterangan">
                    {!! old('keterangan', $data->keterangan) !!}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Umur Penyusutan Barang</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" value="{{ old('umur_penyusutan', $data->umur_penyusutan) }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Image Preview</label>
            <div class="col-sm-10">
                <input type="hidden" name="oldCover" value="{{ $data->image }}">
            @if ($data->image)
                <img src="{{ asset(Storage::url($data->image)) }}" class="img-preview img-fluid mb-3 col-sm-2">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-2">
            @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Upload Gambar</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    {{-- <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage()"> --}}
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
            <label for="" class="col-sm-2 col-form-label">Stock Barang</label>
            <div class="col-sm-2">
                <select class="form-control @error('stock') is-invalid @enderror" name="stock">
                    <option value="">Pilih Status</option>
                    @if ($data->stock)
                        <option value="1" selected>Stock</option>
                    @else
                        <option value="0" selected>Off Stock</option>
                    @endif
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
        <button type="submit" class="btn btn-warning">Edit</button>
        <a href="/assets" class="btn btn-danger">Kembali</a>
    </div>
    </form>
</div>
@endsection

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
@endsection
