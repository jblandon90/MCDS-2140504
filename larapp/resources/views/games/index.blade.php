@extends('layouts.app')
@section('title', 'LARAPP - Lista de Juegos')

@section('content')
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h1> <i class="fas fa-gamepad"></i> Lista de Juegos </h1>
			<hr>
			<a href="{{ url('games/create') }}" class="btn btn-success"> 
				<i class="fa fa-plus"></i>
				Adicionar Juego 
			</a>
			<br><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th class="d-none d-sm-table-cell">Categoría</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($games as $game)
						<tr>
							<td>{{ $game->name }}</td>
							<td class="d-none d-sm-table-cell">
								<img src="{{ asset($game->category->image) }}" width="36px">
							</td>
							<td><img src="{{ asset($game->image) }}" width="36px"></td>
							<td>
								<a href="{{ url('games/'.$game->id) }}" class="btn btn-sm btn-light"><i class="fa fa-search"></i></a>
								<a href="{{ url('games/'.$game->id.'/edit') }}" class="btn btn-sm btn-light"><i class="fa fa-pen"></i></a>
								<form action="{{ url('games/'.$game->id) }}" method="POST" class="d-inline">
									@csrf
									@method('delete')
									<button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $games->links() }}
		</div>
	</div>
@endsection