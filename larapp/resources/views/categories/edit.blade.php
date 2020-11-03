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
                    <a href="{{ route('categories.index') }}">
                        <i class="fa fa-users"></i>  
                         Módulo Categorias
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-pen"></i> 
                    Editar Categoria
                </li>
              </ol>
            </nav>

			<form method="POST" action="{{ url('categories/'.$category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('description', $category->name) }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $category->description) }}" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset($category->image) }}" class="img-thumbnail" id="preview" width="120px">
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
                                <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                                    Editar
                                    <i class="fa fa-save"></i> 
                                </button>
                        </div>
                    </form>
		</div>
	</div>
@endsection