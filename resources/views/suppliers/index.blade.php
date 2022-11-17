@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a class="btn btn-primary" href="/suppliers/create">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name Supplier</th>
                            <th>Kode Item</th>
                            <th>Tanggal Daftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama_pemasok }}</td>
                                <td>{{ $item->kode_pemasok }}</td>
                                <td>{{ $item->tanggal_daftar }}</td>
                                <td>
                                    <a class="btn btn-info" href="" data-toggle="modal" data-target="#modal-info-{{ $item->id }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning" href="/suppliers/{{ $item->id }}/edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    <form action="/suppliers/{{ $item->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure want delete this user?')">
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
            {{ $data->links('partials.pagination') }}
        </div>
    </div>

    {{-- Detail --}}
    @foreach ($data as $item)
    <div class="modal fade" id="modal-info-{{ $item->id }}">
        <div class="modal-dialog">
            <form action="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode supplier</label>
                            <input type="text" class="form-control" value="{{ $item->kode_pemasok }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" class="form-control" value="{{ $item->nama_pemasok }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Telpon</label>
                            <input type="text" class="form-control" value="{{ $item->telpon }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" disabled>
                                {{ $item->alamat }}
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
