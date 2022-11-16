@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a class="btn btn-primary" href="/assets/create">
                    <i class="fas fa-plus"></i>
                </a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa-solid fa-file-excel"></i>
                </button>
            </div>
            <div class="float-right d-inline">
                <div class="input-group">
                    <form action="/assets" method="get">
                        <input type="text" class="form-control" placeholder="Search no. inventory/name item" name="search" autocomplete="off">
                    </form>
                    <div class="input-group-append">
                        <a class="btn btn-outline-secondary" href="/assets">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            Reset
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>No Inventory</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Total Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $items->firstItem() + $loop->index }}</td>
                            <td>{{ $item->no_inventory }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>
                                @if (empty($item->image))
                                    no image
                                @else
                                    <img src="{{ asset(Storage::url($item->image)) }}" class="img-fluid" style="max-width: 100px">
                                @endif
                            </td>
                            {{-- @php
                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp --}}
                            {{-- <td>
                                {!! $generator->getBarcode($item->no_inventory, $generator::TYPE_CODE_128) !!}
                            </td> --}}
                            <td class="text-center">{{ $item->jumlah_item }} {{ $item->ukuran_item }}</td>
                            <td>
                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#modal-info-{{ $item->id }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-warning" href="/assets/{{ $item->id }}/edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/assets/{{ $item->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="" class="btn btn-danger delete" onclick="return confirm('Are you sure want delete this asset?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $items->links('partials.pagination') }}
        </div>
    </div>

    @foreach ($items as $item)
    <div class="modal fade" id="modal-info-{{ $item->id }}">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail <b>{{ $item->no_inventory }}</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>QR Code</label>
                            @php
                                echo DNS2D::getBarcodeHTML($item->no_inventory, 'QRCODE');
                            @endphp
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            @if (empty($item->image))
                                No Image
                            @else
                                <img style="max-width: 200px" class="img-fluid" src="{{ asset(Storage::url($item->image)) }}" alt="{{ $item->image }}">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" value="{{ $item->nama_barang }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="text" class="form-control" value="{{ $item->jumlah_item }} {{ $item->ukuran_item }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" class="form-control" value="{{ $item->lokasi->lokasi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Sumber Perolehan</label>
                            <input type="text" class="form-control" value="{{ $item->sumberItem->sumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Sumber Perolehan</label>
                            <input type="text" class="form-control" value="{{ $item->sumberItem->sumber }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Golongan Barang</label>
                            <input type="text" class="form-control" value="{{ $item->golonganItem->nama_golongan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <input type="text" class="form-control" value="{{ $item->tipeItem->nama_tipe }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kelompok Barang</label>
                            <input type="text" class="form-control" value="{{ $item->kelompokItem->nama_kelompok }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Merk</label>
                            <input type="text" class="form-control" value="{{ $item->brand->nama_brand }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-default">
                            Print
                        </a>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file') is-invalid @enderror">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection