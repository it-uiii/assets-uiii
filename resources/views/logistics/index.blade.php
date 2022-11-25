{{-- @dd($items); --}}
@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                @can('logistic-create')
                <a class="btn btn-primary" href="/logistics/create">
                    <i class="fas fa-plus"></i>
                </a>
                @endcan
                @can('logistic-import')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <i class="fa-solid fa-file-excel"></i>
                </button>
                @endcan
            </div>
            <div class="float-right d-inline">
                <div class="input-group">
                    <form action="/logistics" method="get">
                        <input type="text" class="form-control" placeholder="Nama Barang" name="search" autocomplete="off">
                    </form>
                    <div class="input-group-append">
                        <a class="btn btn-outline-secondary" href="/logistics">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            Reset
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" style="width: 10px">#</th>
                            <th rowspan="2">Nama Barang</th>
                            <th rowspan="2">Qty</th>
                            <th rowspan="2">Satuan</th>
                            <th colspan="3">Harga</th>
                            <th rowspan="2">Sisa</th>
                            <th rowspan="2">Saldo Akhir</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <th>Sebelum Pajak</th>
                            <th>Setelah Pajak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $items->firstItem() + $loop->index }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>Rp {{ $item->harga_satuan }}</td>
                            <td>Rp {{ $item->harga_bef_pajak }}</td>
                            <td>Rp{{ $item->harga_aft_pajak }}</td>
                            <td>
                                @if ($item->sisa == '')
                                    0
                                @else
                                    {{ $item->sisa }}
                                @endif
                            </td>
                            <td>
                                @if ($item->saldo_akhir == '')
                                    0
                                @else
                                    Rp {{ $item->saldo_akhir }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#modal-info-{{ $item->id }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-warning" href="/logistics/{{ $item->id }}/edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/logistics/{{ $item->id }}" method="post" class="d-inline">
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


    {{-- Detail --}}
    @foreach ($items as $item)
    <div class="modal fade" id="modal-info-{{ $item->id }}">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail {{ $item->nama_barang }}</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="" class="btn btn-default">
                            Print
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection