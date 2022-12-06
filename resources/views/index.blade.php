@extends('layout.main')
@section('container')
    

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>2</h3>

                <p>Procurement</p>
                </div>
                <div class="icon">
                <i class="fas fa-truck-ramp-box"></i>
                </div>
                <a href="#" data-toggle="modal" data-target="#modal-xl" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ $items }}</h3>
                <p>Assets UIII</p>
                </div>
                <div class="icon">
                <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('assets.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ $logistic }}</h3>
                <p>Logistics UIII</p>
                </div>
                <div class="icon">
                <i class="fas fa-truck-fast"></i>
                </div>
                <a href="{{ route('logistics.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{ $loc }}</h3>

                <p>Building</p>
                </div>
                <div class="icon">
                <i class="fas fa-building-columns"></i>
                </div>
                <a href="{{ route('locations.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <section class="connectedSortable">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Area
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div id="map" style="width: auto; height: 500px;"></div>
            </div><!-- /.card-body -->
        </div>
    </section>
    
</div>

{{-- modal procurement --}}
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Procurement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>No SPK</th>
                                <th>Item name</th>
                                <th>Division Budget</th>
                                <th>quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>UIII2022/IV/022/01</td>
                                <td>Laptop Acer Aspire 504 Slim 15"</td>
                                <td>Direktorat Riset dan Kerjasama Stategis</td>
                                <td>5 Items</td>
                                <td>
                                    <span class="badge bg-info">On Hold</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>UIII2022/IV/023/02</td>
                                <td>Kulkas LG 2 Pintu</td>
                                <td>Pusat Teknologi Informasi</td>
                                <td>1 Items</td>
                                <td>
                                    <span class="badge bg-warning">On Process</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>UIII2022/IV/023/02</td>
                                <td>Apple macbook pro 14"</td>
                                <td>Pusat Teknologi Informasi</td>
                                <td>1 Items</td>
                                <td>
                                    <span class="badge bg-success">Finish</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>UIII2022/IV/023/02</td>
                                <td>Iphone 13 Pro max</td>
                                <td>Direktorat Sekretariat</td>
                                <td>12 Items</td>
                                <td>
                                    <span class="badge bg-danger">Decline</span>
                                </td>
                            </tr>
                        </tbody>
                        {{-- <tbody>
                        @if (!$items->count())
                        <tr>
                            <td colspan="7" class="text-center">Data not available</td>
                        </tr>
                        @else
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $items->firstItem() + $loop->index }}</td>
                            <td>{{ $item->no_inventory }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->lokasi->lokasi }}</td>
                            <td>{{ $item->pp->nama_pp }}</td>
                            <td>@idr($item->nilai_perolehan)</td>
                            <td class="text-center">{{ $item->jumlah_item }}</td>
                            <td>@idr($item->total)</td>
                            <td>{{ $item->nilai_penyusutan }}</td>
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
                        @endif
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

	const map = L.map('map').setView([-6.388551, 106.861918], 16);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
	}).addTo(map);

    let data = <?php echo json_encode($locations); ?>;

    // console.log(data);
    data.map(function(d){
        const area = L.marker([d.latitude, d.longitude]).addTo(map)
        .bindPopup(`${d.image}<br>${d.no_inventory} <br> ${d.nama_barang}`)
    });
    

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(`You clicked the map at ${e.latlng.toString()}`)
			.openOn(map);
	}

	map.on('click', onMapClick);

</script>

@endsection