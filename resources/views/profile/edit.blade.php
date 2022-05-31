@extends('adminlte::page')

@section('title', 'Tambah Data Sekolah')

@section('content_header')
    <h1>Profil Saya</h1>
@stop
@section('content')
    {{-- <div class="container-fluid"> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <h3 class="card-title">Edit Profil</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                        enctype="multipart/form-data" files="true">
                        @csrf
                        @method('put')

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name"
                                            class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                            for="input-username">{{ __('Username') }}</label>
                                        <input type="text" name="username" id="input-username"
                                            class="form-control form-control-alternative{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('username') }}"
                                            value="{{ old('username', auth()->user()->username) }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email"
                                            class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('handphone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                            for="input-handphone">{{ __('handphone') }}</label>
                                        <input type="text" name="handphone" id="input-handphone"
                                            class="form-control form-control-alternative{{ $errors->has('handphone') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('handphone') }}"
                                            value="{{ old('handphone', auth()->user()->handphone) }}" required autofocus>

                                        @if ($errors->has('handphone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('handphone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-alamat">{{ __('alamat') }}</label>
                                        <textarea rows="3" type="text" name="alamat" id="input-alamat"
                                            class="form-control form-control-alternative{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('alamat') }}" required autofocus>{{ old('alamat', auth()->user()->alamat) }}
                                            </textarea>

                                        @if ($errors->has('alamat'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="label">{{ __('Foto Profil') }}</label>
                                        <br>

                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput"
                                            data-name="file">
                                            <div class="fileinput-new img-thumbnail img-raised">
                                                @if (isset(auth()->user()->foto))
                                                    <img data-src="holder.js/100%x100%" alt=""
                                                        src="{{ auth()->user()->foto }}" width="100%">
                                                @else
                                                    @if (config('adminlte.usermenu_image'))
                                                        <img src="{{ Auth::user()->adminlte_image() }}"
                                                            class="user-image img-circle elevation-2"
                                                            alt="{{ Auth::user()->name }}">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists img-thumbnail img-raised"
                                                style="max-width: 300px; max-height: 300px;"></div>
                                            <div>
                                                <span class="btn btn-raised btn-round btn-info btn-file">
                                                    <span class="fileinput-new">Pilih Gambar</span>
                                                    <span class="fileinput-exists">Ganti</span>
                                                    <input class="{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                                                        type="file" name="foto" id="file" required="true"
                                                        aria-required="true">
                                                    @if ($errors->has('foto'))
                                                        <span id="file-error" class="error text-danger"
                                                            for="input-file">{{ $errors->first('foto') }}</span>
                                                    @endif
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput">
                                                    <i class="fa fa-times"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                    <hr class="my-4" />
                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                        @if (session('password_status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('password_status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <label class="form-control-label"
                                    for="input-current-password">{{ __('Current Password') }}</label>
                                <input type="password" name="old_password" id="input-current-password"
                                    class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Current Password') }}" value="" required>

                                @if ($errors->has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                <input type="password" name="password" id="input-password"
                                    class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('New Password') }}" value="" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label"
                                    for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation"
                                    class="form-control form-control-alternative"
                                    placeholder="{{ __('Confirm New Password') }}" value="" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
