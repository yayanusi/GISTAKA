@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    <h1>Edit Data Sekolah TK</h1>
@stop
@section('content')
    <form action="{{ route('places.update', $place) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <x:notify-messages />
                    <div class="card-header">
                        <h3 class="card-title">Informasi Dasar</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="form-row mb-2">
                                <div class="col">
                                    <label for="">Nama Sekolah</label>
                                    <input type="text" name="place_name"
                                        class="form-control @error('place_name') is-invalid @enderror"
                                        value="{{ $place->place_name }}">
                                    @error('place_name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="">Upload foto</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" placeholder="file image">
                                    <small><strong>**let empty if there is no image to upload</strong></small>
                                    @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-row mb-2">
                                <div class="col">
                                    <label for="">Address</label>
                                    <textarea name="address" placeholder="Address here..." class="form-control @error('address') is-invalid @enderror"
                                        cols="4" rows="8">{{ $place->address }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="">Description</label>
                                    <textarea name="description" placeholder="Description here..."
                                        class="form-control @error('description') is-invalid @enderror" cols="4"
                                        rows="8">{{ $place->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Lokasi</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-2">
                                <div class="col">
                                    <label for="">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" readonly
                                        class="form-control @error('longitude') is-invalid @enderror"
                                        value="{{ $place->longitude }}">
                                    @error('longitude')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" readonly
                                        class="form-control @error('latitude') is-invalid @enderror"
                                        value="{{ $place->latitude }}">
                                    @error('latitude')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="mapid"></div>

                        </div>
                    </div>
                </div>

                <div class="form-group float-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-arrow-right-to-bracket"></i> Update</button>
                </div>
            </div>

        </div>
    </form>

@endsection

@section('css')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #mapid {
            min-height: 500px;
            widows: 100%;
        }

    </style>
@endsection

@push('js')
    <!-- Leaflet JavaScript -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        var mapCenter = [
            {{ $place->latitude }},
            {{ $place->longitude }},
        ];
        var map = L.map('mapid').setView(mapCenter, {{ config('leafletsetup.zoom_level') }});
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker(mapCenter).addTo(map);

        function updateMarker(lat, lng) {
            marker
                .setLatLng([lat, lng])
                .bindPopup("Your location :" + marker.getLatLng().toString())
                .openPopup();
            return false;
        };

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            updateMarker(latitude, longitude);
        });

        var updateMarkerByInputs = function() {
            return updateMarker($('#latitude').val(), $('#longitude').val());
        }
        $('#latitude').on('input', updateMarkerByInputs);
        $('#longitude').on('input', updateMarkerByInputs);
    </script>
@endpush
