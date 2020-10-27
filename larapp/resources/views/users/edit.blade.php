@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1>
				<i class="fa fa-pen"></i> 
				Editar Usuario
			</h1>
			<hr>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">
                        <i class="fa fa-clipboard-list"></i>  
                        Escritorio
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i>  
                         Módulo Usuarios
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-pen"></i> 
                    Editar Usuario
                </li>
              </ol>
            </nav>

			<form method="POST" action="{{ url('users/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname', $user->fullname) }}" placeholder="@lang('general.label-fullname')" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="@lang('general.label-email')">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="@lang('general.label-phone')">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" placeholder="@lang('general.label-birthdate')">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Seleccione el Genero...</option>
                                    <option value="Female" @if(old('gender', $user->gender) == 'Female') selected @endif>@lang('general.select-female')</option>
                                    <option value="Male" @if(old('gender', $user->gender) == 'Male') selected @endif>@lang('general.select-male')</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" placeholder="@lang('general.label-address')">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset($user->photo) }}" class="img-thumbnail" id="preview" width="120px">
                                </div>
                                <div class="custom-file">
                                   <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                   <label class="custom-file-label" for="customFile"> 
                                   	 <i class="fa fa-upload"></i> 
                                   	 Foto
                                   </label>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>    
                        </div>

                        <div class="form-group">
                                <select name="active" id="active" class="form-control @error('active') is-invalid @enderror">
                                    <option value="">Seleccione el Estado...</option>
                                    <option value="1" @if(old('active', $user->active) == 1) selected @endif>Activo</option>
                                    <option value="0" @if(old('active', $user->active) == 0) selected @endif>Inactivo</option>
                                </select>

                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                                    Editar
                                    <i class="fa fa-save"></i> 
                                </button>
                        </div>
                    </form>
		</div>
	</div>
@endsection