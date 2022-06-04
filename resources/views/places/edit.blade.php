@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    <h1>Edit Data Sekolah TK</h1>
@stop
@section('content')
    <form action="{{ route('places.update', $place->id) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="">Biaya SPP (Rp)</label>
                                    <input type="text" name="spp" id="spp"
                                        class="form-control @error('spp') is-invalid @enderror" value="{{ $place->spp }}">
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
                                        value="{{ $place->biaya_masuk }}">
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
                                        value="{{ $place->batas_tampung }}">
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
                                        value="{{ old('pengajar') ? old('pengajar') : $place->pengajar }}">
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
                                        <option value="1" {{ $place->akreditasi == 1 ? 'selected' : '' }}>A</option>
                                        <option value="2" {{ $place->akreditasi == 2 ? 'selected' : '' }}>B</option>
                                        <option value="3" {{ $place->akreditasi == 3 ? 'selected' : '' }}>C</option>
                                        <option value="4" {{ $place->akreditasi == 4 ? 'selected' : '' }}>D</option>
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
                                        <option value="1" {{ $place->status == 1 ? 'selected' : '' }}>Negeri</option>
                                        <option value="2" {{ $place->status == 2 ? 'selected' : '' }}>Swasta</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="">Menerima Anak Berkebutuhan Khusus</label>
                                    <select name="abk" id="abk" class="form-control @error('abk') is-invalid @enderror"
                                        required>
                                        <option value="" disabled selected>Choose one</option>
                                        <option value="1" {{ $place->abk == 1 ? 'selected' : '' }}>Ya</option>
                                        <option value="2" {{ $place->abk == 2 ? 'selected' : '' }}>Tidak</option>
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
                                    <textarea name="fasilitas" placeholder="fasilitas here..." class="form-control @error('fasilitas') is-invalid @enderror"
                                        cols="4"
                                        rows="8">{{ old('fasilitas') ? old('fasilitas') : $place->fasilitas }}</textarea>
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
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i> Update</button>
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
