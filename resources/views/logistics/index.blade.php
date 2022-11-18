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
                            <th rowspan="2">Satuan</th>
                            <th rowspan="2">Qty</th>
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
                        @if (count($items))
                            <td colspan="10">No data</td>
                        @else
                            @foreach ($items as $item)
                                <td></td>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{-- {{ $items->links('partials.pagination') }} --}}
        </div>
    </div>


    {{-- <div class="modal fade" id="modal-default">
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
    <!-- /.modal --> --}}
@endsection