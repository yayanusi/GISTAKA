@extends('frontend.master')
@section('indexStyle') style="height: 25px!important;" @stop
@section('content')
    <section class="main-content">
        <div class="form-group">
            <input type="text" name="" id="textsearch" placeholder="search place here..." class="form-control">
        </div>
        <div id="mapid">
            <div class="card">
                <div class="card-body"></div>
            </div>
        </div>
         
    </section>
        @include('frontend.modal')

@endsection
{{-- @section('content')
    <section class="main-content" id="mapid">
        
    </section>
    @include('frontend.modal')
@endsection --}}

@section('css')

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.css">
    <style>
        #mapid {
            height: 876px;
            max-height: 100% !important;
            width: 100%;
        }

    </style>
@endsection

@push('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Leaflet JavaScript -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://labs.easyblog.it/maps/leaflet-search/src/leaflet-search.js"></script>
    <script>
        var map = L.map('mapid').setView([{{ config('leafletsetup.map_center_latitude') }},
                {{ config('leafletsetup.map_center_longitude') }}
            ],
            {{ config('leafletsetup.zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        axios.get('{{ route('api.places.index') }}')
            .then(function(response) {
                // console.log(response.data);
                L.geoJSON(response.data, {
                        // filter: function(feature, layer) {
                        //     return feature.properties.cluster == "0";
                        // },
                        pointToLayer: function(geoJsonPoint, latlng) {
                            // console.log(response.data);

                            return L.marker(latlng);
                        },

                        onEachFeature: function(feature, layer) {
                            layer.bindPopup(
                                '<div class="my-2"><strong>Nama Sekolah TK</strong> :<br>' + layer.feature.properties.place_name + '</div> <div class="my-2"><strong>Alamat</strong>:<br>' +
                                layer.feature.properties.address +
                                '</div>');
                            layer.on('mouseover', function(e) {
                                this.openPopup()
                            });
                            layer.on('mouseout', function(e) {
                                this.closePopup()
                            });
                            layer.on('click', function(e) {

                                // Promise.all([axiosHome,  axiosUserData]);

                                $('#modal-header-lg').empty();
                                $('#modal-body-lg').empty();
                                $('#modal-lg').modal('show');
                                $('#modal-header-lg').append('DETAIL SEKOLAH');
                                $('#modal-body-lg').append(
                                    '@if ('+layer.feature.properties.image+' !== '+null+')<div class="card mb-4"><div class="card-header">Foto Sekolah</div><div class="card-body"><img src="'+layer.feature.properties.image+'" width="100%"/></div></div>@endif<div class="card"><div class="card-header bg-light"><strong>SEKOLAH ' +
                                    layer.feature.properties.place_name +
                                    '</strong></div><div class="card-body table-responsive"><table class="table table-striped "><tr><td>Alamat</td><td>: </td><td>' +
                                    layer.feature.properties.address +
                                    '</td></tr><tr><td>Biaya SPP (Rp)</td><td>: </td><td>' + layer.feature
                                    .properties.spp +
                                    '</td></tr><tr><td>Biaya Masuk (Rp)</td><td>: </td><td>' + layer
                                    .feature.properties.biaya_masuk +
                                    '</td></tr><tr><td>Batas Tampung Kelas</td><td>: </td><td>' + layer.feature
                                    .properties.batas_tampung +
                                    '</td></tr><tr><td>Titik Koordinat</td><td>: </td><td>' + layer
                                    .feature.properties.latitude + ',' + layer.feature.properties.longitude +
                                    '</td></tr><tr><td>Jumlah Pegajar</td><td>: </td><td>' +
                                    layer.feature.properties.pengajar +
                                    '</td></tr></table></div></div></div>'
                                );
                            });
                        }
                    })

                    .addTo(map);
                // console.log(response.data);
            })
        .catch(function(error) {
            console.log(error);
        });


        //SIMPLE SEARCH LOCATION
        var data = [
            <?php
        foreach ($places as $key => $value) {
        ?> {
                "loc": [<?= $value->latitude ?>, <?= $value->longitude ?>],
                "title": '<?= $value->place_name ?>'
            },
            <?php } ?>
        ];

        var markersLayer = new L.LayerGroup(); //layer contain searched elements

        map.addLayer(markersLayer);
        console.log(data);
        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 17,
            markerLocation: true
        })
        map.addControl(controlSearch);
        ////////////populate map with markers from sample data
        for (i in data) {
            var title = data[i].title, //value searched
                loc = data[i].loc, //position found
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                }); //se property searched
            marker.bindPopup('title: ' + title);
            markersLayer.addLayer(marker);
        }
        // SIMPLE SEARCH LOCATION
        $('#textsearch').on('keyup', function(e) {

            controlSearch.searchText(e.target.value);
        });
    </script>
@endpush
