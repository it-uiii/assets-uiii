{{-- @dd($res); --}}
@extends('layout.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                @can('user-create')
                    <a class="btn btn-primary" href="/locations/create">
                        <i class="fas fa-plus"></i>
                    </a>
                @endcan
            </div>
            <div class="float-right">
                <div class="input-group">
                    <form action="/locations" method="get">
                        <input type="text" class="form-control" placeholder="Cari lokasi" name="search" autocomplete="off">
                    </form>
                    <div class="input-group-append">
                        <a class="btn btn-outline-secondary" href="/locations">
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
                            <th>Lokasi</th>
                            <th>Kode Lokasi</th>
                            <th>Map</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $item)
                            <tr>
                                <td>{{ $locations->firstItem() + $loop->index }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->kode_lokasi }}</td>
                                <td>
                                    <button class="btn btn-default location" data-toggle="modal" data-target="#modalMaps-{{ $item->id }}">
                                        <i class="fa-solid fa-map-pin"></i>
                                    </button>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @can('location-edit')
                                        <a class="btn btn-warning" href="/locations/{{ $item->id }}/edit"><i
                                                class="fas fa-pen"></i></a>
                                    @endcan
                                    @can('location-delete')
                                        <form action="/locations/{{ $item->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure want delete this locations?')">
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
            {{ $locations->links('partials.pagination') }}
        </div>
    </div>

@foreach ($locations as $item)
{{-- show maps --}}
<div class="modal fade" id="modalMaps-{{ $item->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Map pinned</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=760&amp;height=500&amp;hl=en&amp;q={{ $item->kordinasi }}&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">Format JSON</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:500px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:500px;}.gmap_iframe {height:500px!important;}</style></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach

@endsection
