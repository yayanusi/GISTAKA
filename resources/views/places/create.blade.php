@extends('adminlte::page')

@section('title', 'Tambah Data Sekolah')

@section('content_header')
    <h1>Tambah Data Sekolah TK</h1>
@stop
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="callout callout-info">
                <h5><i class="fa fa-info"></i> Info:</h5>
                Anda dapat menginputkan data dengan cara manual ataupun dengan import banyak data sekaligus. Untuk
                mengimport data, klik <strong>Tab Import Data</strong>, download template excelnya terlebih dahulu, salin
                data anda kedalam file excel kemudian, masukan file excel tersebut ke menu import.
            </div>
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#manual" data-toggle="tab">Manual
                                Input</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="#import" data-toggle="tab">Import Data</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="manual">
                            <form action="{{ route('places.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Place Name</label>
                                            <input type="text" name="place_name"
                                                class="form-control @error('place_name') is-invalid @enderror"
                                                placeholder="Place name here...">
                                            @error('place_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Upload image</label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror"
                                                placeholder="file image">
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
                                            <label for="">Biaya SPP (Rp)</label>
                                            <input type="text" name="spp" id="spp"
                                                class="form-control @error('spp') is-invalid @enderror" placeholder="spp">
                                            @error('spp')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Biaya Masuk (Rp)</label>
                                            <input type="text" name="biaya_masuk" id="biaya_masuk"
                                                class="form-control @error('biaya_masuk') is-invalid @enderror"
                                                placeholder="biaya_masuk">
                                            @error('biaya_masuk')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Batas Tampung Kelas</label>
                                            <input type="text" name="batas_tampung" id="batas_tampung"
                                                class="form-control @error('batas_tampung') is-invalid @enderror"
                                                placeholder="batas_tampung">
                                            @error('batas_tampung')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Jumlah Pengajar</label>
                                            <input type="text" name="pengajar" id="pengajar"
                                                class="form-control @error('pengajar') is-invalid @enderror"
                                                placeholder="pengajar">
                                            @error('pengajar')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Akreditasi</label>
                                            <select name="akreditasi" id="akreditasi"
                                                class="form-control @error('akreditasi') is-invalid @enderror" required>
                                                <option value="" disabled selected>Choose one</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="4">D</option>
                                            </select>
                                            @error('akreditasi')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Status</label>
                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror" required>
                                                <option value="" disabled selected>Choose one</option>
                                                <option value="1">Negeri</option>
                                                <option value="2">Swasta</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Menerima Anak Berkebutuhan Khusus</label>
                                            <select name="abk" id="abk"
                                                class="form-control @error('abk') is-invalid @enderror" required>
                                                <option value="" disabled selected>Choose one</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            @error('abk')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Fasilitas</label>
                                            <textarea name="fasilitas" placeholder="fasilitas here..."
                                                class="form-control @error('fasilitas') is-invalid @enderror" cols="4"
                                                rows="8"></textarea>
                                            @error('fasilitas')
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
                                                cols="4" rows="8"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="">Description</label>
                                            <textarea name="description" placeholder="Description here..."
                                                class="form-control @error('description') is-invalid @enderror"
                                                cols="4" rows="8"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Longitude</label>
                                            <input type="text" name="longitude" id="longitude" readonly
                                                class="form-control @error('longitude') is-invalid @enderror"
                                                placeholder="longitude">
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
                                                placeholder="latitude">
                                            @error('latitude')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row"> --}}
                                    <div id="mapid"></div>
                                    {{-- </div> --}}
                                    {{-- <div class="form-group float-right mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                                    </div> --}}

                                    <div class="form-group row">
                                        <div class="col-sm-12 mt-4 text-center">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="import">
                            <form class="form-horizontal" action="{{ route('import.place') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Gunakan template terbaru</label>
                                    <div class="col-sm-10">
                                        <a class="btn btn-success btn-sm" href="{{ route('template.place') }}"><i
                                                class="fa fa-cloud-download"></i> Download</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Pilih File</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="excel" name="excel"
                                            accept=".xls,.xlsx,file_extension">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
            min-height: 500px;
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
            {{ config('leafletsetup.map_center_latitude') }},
            {{ config('leafletsetup.map_center_longitude') }},
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
