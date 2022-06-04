@extends('adminlte::page')

@section('title', 'Tambah Data Sekolah')

@section('content_header')
    <h1>Detail Data Sekolah TK</h1>
@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">Informasi Umum</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Tempat</td>
                                <td>{{ $place->place_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $place->address }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>{{ $place->description }}</td>
                            </tr>
                            <tr>
                                <td>Biaya SPP (Rp)</td>
                                <td>{{ $place->spp }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Masuk (Rp)</td>
                                <td>{{ $place->biaya_masuk }}</td>
                            </tr>
                            <tr>
                                <td>Batas Tampung Kelas</td>
                                <td>{{ $place->batas_tampung }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Pengajar</td>
                                <td>{{ $place->pengajar }}</td>
                            </tr>
                            <tr>
                                <td>Akreditasi</td>
                                <td>
                                    @if ($place->akreditasi == 1)
                                        A
                                    @elseif($place->akreditasi == 2)
                                        B
                                    @elseif($place->akreditasi == 3)
                                        C
                                    @else
                                        D
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if ($place->status == 1)
                                        Negeri
                                    @else
                                        Swasta
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Menerima ABK</td>
                                <td>
                                    @if ($place->abk == 1)
                                        Ya
                                    @else
                                        Tidak
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td>{{ $place->fasilitas }}</td>
                            </tr>
                        </tbody>
                        <td><a href="{{ route('frontpage') }}" class="btn btn-secondary">Kembali</a></td>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if (isset($place->image))
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-info">Foto Sekolah</div>
                        <div class="card-body">
                            <img src="{{ $place->image }}" width="100%" alt="">
                        </div>
                    </div>
                </div>
            @endif

            <div class="col">
                <div class="card">
                    <div class="card-header bg-info">Titik Lokasi</div>
                    <div class="card-body" id="mapid"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #mapid {
            min-height: 400px;
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
        var map = L.map('mapid').setView([{{ $place->latitude }}, {{ $place->longitude }}],
            {{ config('leafletsetup.detail_zoom_level') }});

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $place->latitude }}, {{ $place->longitude }}]).addTo(map)

        axios.get('{{ route('api.places.index') }}')
            .then(function(response) {
                //console.log(response.data);
                L.geoJSON(response.data, {
                        pointToLayer: function(geoJsonPoint, latlng) {
                            return L.marker(latlng);
                        }
                    })
                    .bindPopup(function(layer) {
                        //return layer.feature.properties.map_popup_content;
                        return ('<div class="my-2"><strong>Place Name</strong> :<br>' + layer.feature.properties
                            .place_name + '</div> <div class="my-2"><strong>Description</strong>:<br>' + layer
                            .feature.properties.description +
                            '</div><div class="my-2"><strong>Address</strong>:<br>' + layer.feature.properties
                            .address + '</div>');
                    }).addTo(map);
                console.log(response.data);
            })
            .catch(function(error) {
                console.log(error);
            });
    </script>
@endpush
