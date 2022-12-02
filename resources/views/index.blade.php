@extends('layout.main')
@section('container')
    

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>44</h3>

                <p>Procurement</p>
                </div>
                <div class="icon">
                <i class="fas fa-truck-ramp-box"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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


<script>

	const map = L.map('map').setView([-6.388551, 106.861918], 16);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
	}).addTo(map);

    let data = <?php echo json_encode($locations); ?>;

    // console.log(data);
    data.map(function(d){
        const area = L.marker([d.latitude, d.longitude]).addTo(map)
        .bindPopup(`${d.no_inventory} <br> ${d.nama_barang}`)
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