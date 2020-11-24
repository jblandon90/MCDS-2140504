@extends('layouts.app')
@section('title', 'Consultar Juego')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>
				<i class="fa fa-search"></i>
				Consultar Juego
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
                    <i class="fa fa-search"></i> 
                    Consultar Juego
                </li>
              </ol>
            </nav>
			<table class="table table-striped table-hover">
				<tr>
					<td colspan="2" class="text-center">
						<img src="{{ asset($game->image) }}" class="img-thumbnail" width="180px">
					</td>
				</tr>
				<tr>
					<th>Nombre:</th>
					<td>{{ $game->name }}</td>
				</tr>
				<tr>
					<th>Descripción:</th>
					<td>{{ $game->description }}</td>
				</tr>
				<tr>
					<th>Usuario:</th>
					<td>{{ $game->user->fullname }}</td>
				</tr>
				<tr>
					<th>Categoría:</th>
					<td>
						<img src="{{ asset($game->category->image) }}" width="36px">
					</td>
				</tr>
				<tr>
					<th>Destacado:</th>
					<td>
						@if ($game->slider == 1)
							<button class="btn btn-success"> <i class="fa fa-check"></i> Si </button>
						@else
							<button class="btn btn-dark"> <i class="fa fa-times"></i> No </button>
						@endif
					</td>
				</tr>
				<tr>
					<th>Precio:</th>
					<td><i class="fa fa-dollar-sign"></i> {{ $game->price }}</td>
				</tr>
			</table>
		</div>
	</div>
	
@endsection