@extends('adminlte::page')

@section('title', 'Detail Berita')

@section('content_header')
    <h1>Berita</h1>
@stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info">Foto Berita</div>
                <div class="card-body">
                    <img src="{{ $data->foto }}" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">Detail Berita</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>

                            <tr>
                                <td>Judul Berita</td>
                                <td>{{ $data->judul }}</td>
                            </tr>
                            <tr>
                                <td>Preview</td>
                                <td>{{ $data->preview }}</td>
                            </tr>
                            <tr>
                                <td>Isi</td>
                                <td>{!! $data->isi !!}</td>
                            </tr>
                        </tbody>
                        <td><a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a></td>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
