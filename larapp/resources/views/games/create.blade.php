@extends('layouts.app')

@section('title', 'Crear Juego')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>
                <i class="fa fa-plus"></i>
                Adicionar Juego
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
                        <a href="{{ route('games.index') }}">
                            <i class="fas fa-gamepad"></i>
                            Módulo Juegos
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa fa-plus"></i>
                        Adicionar Juego
                    </li>
                </ol>
            </nav>

            <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <textarea name="description" class="form-control @error('description') is-invalid
                                @enderror" rows="3" placeholder="Descripción">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <div class="text-center my-3">
                                <img src="{{ asset('imgs/no-category.png') }}" class="img-thumbnail" id="preview" width="120px">
                            </div>
                            <div class="custom-file">
                               <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                               <label class="custom-file-label" for="customFile">
                                    <i class="fa fa-upload"></i>
                                    Imagen
                               </label>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>

                    <div class="form-group">
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="">Seleccione Usuario...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($user->id == old('user_id')) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Seleccione Categoría...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <select name="slider" class="form-control @error('slider') is-invalid @enderror">
                                <option value="">Seleccione Presentación...</option>
                                <option value="1" @if (old('slider') == 1) selected @endif>Si</option>
                                <option value="2" @if (old('slider') == 2) selected @endif>No</option>
                            </select>

                            @error('slider')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Precio" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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