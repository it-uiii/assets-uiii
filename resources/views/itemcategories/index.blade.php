@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <a class="btn btn-primary" href="/itemcategories/create">
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
                            <th>Name tipe</th>
                            <th>Kode tipe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $data->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama_kelompok }}</td>
                                <td>{{ $item->kode_kelompok }}</td>
                                <td>
                                    <a class="btn btn-info" href="/itemcategories/{{ $item->id }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning" href="/itemcategories/{{ $item->id }}/edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    <form action="/itemcategories/{{ $item->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure want delete this source group items?')">
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
@endsection
