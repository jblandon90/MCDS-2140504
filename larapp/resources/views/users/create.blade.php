@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="row">
<div class="col-md-6 offset-md-3">
<h1>
<i class="fa fa-plus"></i>
Adicionar Usuarios
</h1>
<hr>
<form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
@csrf
<div class="form-group">
<input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" placeholder="@lang('general.label-fullname')" autofocus>

                            @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="@lang('general.label-email')">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="@lang('general.label-phone')">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" placeholder="@lang('general.label-birthdate')">

                            @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">@lang('general.select-value')</option>
                                <option value="Female" @if(old('gender') == 'Female') selected @endif>@lang('general.select-female')</option>
                                <option value="Male" @if(old('gender') == 'Male') selected @endif>@lang('general.select-male')</option>
                            </select>

                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="@lang('general.label-address')">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <div class="custom-file">
                               <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                               <label class="custom-file-label" for="customFile"> 
                                    <i class="fa fa-upload"></i> 
                                    Foto
                               </label>
                            </div>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="@lang('general.label-password')">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('general.label-confirm')">
                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                                Adicionar
                                <i class="fa fa-save"></i> 
                            </button>
                    </div>
                </form>
    </div>
</div>
@endsection