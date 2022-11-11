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
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Total item</th>
                            <th>Merk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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