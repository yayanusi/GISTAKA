@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Data Berita')
@section('content_header')
    <h1>Data Berita</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header bg-success border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="card-title">{{ __('Tambah Berita') }}</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('berita.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col">
                            <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-judul">{{ __('Judul') }}</label>
                                <input type="text" name="judul" id="input-judul"
                                    class="form-control form-control-alternative{{ $errors->has('judul') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('judul') }}" value="{{ old('judul') ? old('judul') : $edit->judul }}" required autofocus>

                                @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('preview') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-preview">{{ __('Preview') }}</label>
                                <textarea rows="3" type="preview" name="preview" id="input-preview"
                                    class="form-control form-control-alternative{{ $errors->has('preview') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('preview') }}" required>{{ old('preview') ? old('preview') : $edit->preview }}</textarea>

                                @if ($errors->has('preview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('preview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Upload image</label>
                                <input type="file" name="foto" class="form-control @error('image') is-invalid @enderror"
                                    placeholder="file image">
                                <small><strong>**let empty if there is no image to upload</strong></small>
                                @error('foto')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-sumber_foto">{{ __('Sumber Foto') }}</label>
                                <input type="text" name="sumber_foto" id="input-sumber_foto"
                                    class="form-control form-control-alternative"
                                    placeholder="{{ __('masukan sumber foto') }}" value="{{ old('sumber_foto') ? old('sumber_foto') : $edit->sumber_foto }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('isi') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-isi">{{ __('Isi') }}</label>
                        <textarea id="summernote" name="isi" placeholder="{{ __('isi') }}" required>{{ old('isi') ? old('isi') : $edit->isi }}</textarea>

                        @if ($errors->has('isi'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">

@endsection
@section('js')
    <script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                height: 350, //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            })
        })
    </script>
@endsection
