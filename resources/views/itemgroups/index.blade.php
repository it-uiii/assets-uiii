@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                @can('golongan-create')
                <a class="btn btn-primary" href="/itemgroups/create">
                    <i class="fas fa-plus"></i>
                </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name golongan</th>
                            <th>Kode golongan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama_golongan }}</td>
                                <td>{{ $item->kode_golongan }}</td>
                                <td>
                                    @can('golongan-edit')
                                    <a class="btn btn-warning" href="/itemgroups/{{ $item->id }}/edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    @endcan
                                    @can('golongan-delete')
                                    <form action="/itemgroups/{{ $item->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure want delete this source group items?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
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
@endsection
