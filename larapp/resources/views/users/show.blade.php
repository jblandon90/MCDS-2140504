@extends('layouts.app')
@section('title', 'Consultar Usuario')

@section('content')
<div class="row">
<div class="col-md-8 offset-md-2">
<h1>
<i class="fa fa-search"></i>
Consultar Usuario
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
<i class="fa fa-search"></i>
Consultar Usuario
</li>
</ol>
</nav>
<table class="table table-striped table-hover">
<tr>
<td colspan="2" class="text-center">
<img src="{{ asset($user->photo) }}" class="img-thumbnail" width="180px">
</td>
</tr>
<tr>
<th>Nombre Completo:</th>
<td>{{ $user->fullname }}</td>
</tr>
<tr>
<th>Correo Electrónico:</th>
<td>{{ $user->email }}</td>
</tr>
<tr>
<th>Teléfono:</th>
<td>{{ $user->phone }}</td>
</tr>
<tr>
<th>Fecha de Nacimiento:</th>
<td>{{ $user->birthdate }}</td>
</tr>
<tr>
<th>Genero:</th>
<td>
@if ($user->gender == 'Female')
Mujer <i class="fas fa-venus"></i>
@else
Hombre <i class="fas fa-mars"></i>
@endif
</td>
</tr>
<tr>
<th>Dirección:</th>
<td>{{ $user->address }}</td>
</tr>
<tr>
<th>Rol:</th>
<td>
@if ($user->role == 'Admin')
<i class="fas fa-user-ninja"></i> Administrador
@else
<i class="fas fa-user"></i> Cliente
@endif
</td>
</tr>
<tr>
<th>Estado:</th>
<td>
@if ($user->active == 1)
<button class="btn btn-success">
<i class="fa fa-check"></i> Activo
</button>
@else
<button class="btn btn-danger">
<i class="fas fa-skull-crossbones"></i> Inactivo
</button>
@endif
</td>
</tr>
</table>
</div>
</div>

@endsection