@extends('layouts.app')
@section('title', 'Consultar Categoria')

@section('content')
<div class="row">
<div class="col-md-8 offset-md-2">
<h1>
<i class="fa fa-search"></i>
Consultar Categoria
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
<a href="{{ route('catergories.index') }}">
<i class="fa fa-categories"></i>
Módulo Categoria
</a>
</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fa fa-search"></i>
Consultar Categoria
</li>
</ol>
</nav>
<table class="table table-striped table-hover">
<tr>
<td colspan="2" class="text-center">
<img src="{{ asset($category->image) }}" class="img-thumbnail" width="180px">
</td>
</tr>
<tr>
<th>Nombre de la Categoria:</th>
<td>{{ $category->name }}</td>
</tr>
<tr>
<th>Descripcion:</th>
<td>{{ $category->description }}</td>
</tr>

</table>
</div>
</div>

@endsection