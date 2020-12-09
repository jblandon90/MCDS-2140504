@extends('layouts.app')
@section('title', 'LARAPP - Lista de Usuarios')

@section('content')
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h1> <i class="fa fa-users"></i> Lista de Usuarios </h1>
			<hr>
			<a href="{{ url('users/create') }}" class="btn btn-success"> 
				<i class="fa fa-plus"></i>
				Adicionar Usuario 
			</a>
			<form action="{{ url('import/excel/users') }}" method="POST" enctype="multipart/form-data" class="d-inline">
				@csrf
				<input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
				<button type="button" class="btn btn-success btn-excel">
					<i class="fa fa-file-excel"></i> 
					Importar Usuarios
				</button>
			</form>
			<a href="{{ url('generate/pdf/users') }}" class="btn btn-larapp"> 
				<i class="fa fa-file-pdf"></i>
				Exportar PDF 
			</a>
			<a href="{{ url('generate/excel/users') }}" class="btn btn-larapp"> 
				<i class="fa fa-file-excel"></i>
				Exportar Excel 
			</a>
			<input type="hidden" id="tmodel" value="users">
            <input type="text" id="qsearch" name="qsearch" class="form-search" autocomplete="off" placeholder="Buscar">
            <br>
            <div class="loader d-none text-center mt-5">
                <img src="{{ asset('imgs/loader.gif')}}" width="100px">
            </div>
			<br><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre Completo</th>
						<th class="d-none d-sm-table-cell">Correo Electrónico</th>
						<th class="d-none d-sm-table-cell">Teléfono</th>
						<th>Foto</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="content">
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->fullname }}</td>
							<td class="d-none d-sm-table-cell">{{ $user->email }}</td>
							<td class="d-none d-sm-table-cell">{{ $user->phone }}</td>
							<td><img src="{{ asset($user->photo) }}" width="36px"></td>
							<td>
								<a href="{{ url('users/'.$user->id) }}" class="btn btn-sm btn-light"><i class="fa fa-search"></i></a>
								<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-light"><i class="fa fa-pen"></i></a>
								<form action="{{ url('users/'.$user->id) }}" method="POST" class="d-inline">
									@csrf
									@method('delete')
									<button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
@endsection