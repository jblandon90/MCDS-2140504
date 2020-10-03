
@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2">
<div class="card">
<div class="card-header"><h2>Ejemplos BLADE</h2></div>

            <div class="card-body">
                <h4>Condicionales (if-elseif-else)</h4>
                @php $color = 'success'; @endphp
                @if ($color == 'danger')
                    <div class="alert alert-danger">
                        {{ $color }}
                    </div>
                @elseif($color == 'success')
                    <div class="alert alert-success">
                        {{ $color }}
                    </div>
                @else
                    <div class="alert alert-warning">
                        {{ $color }}
                    </div>
                @endif
                <h4>Condicional (switch)</h4>
                @php $day = date('n'); @endphp
                @switch($day)
                    @case(9) {{-- 10 --}}
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-dark">CUARTO TRIMESTRE</li>
                          <li class="list-group-item active">Octubre</li>
                          <li class="list-group-item">Noviembre</li>
                          <li class="list-group-item">Diciembre</li>
                        </ul>
                        @break
                    @case(11)
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-dark">CUARTO TRIMESTRE</li>
                          <li class="list-group-item">Octubre</li>
                          <li class="list-group-item active">Noviembre</li>
                          <li class="list-group-item">Diciembre</li>
                        </ul>
                        @break
                    @default
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-dark">CUARTO TRIMESTRE</li>
                          <li class="list-group-item">Octubre</li>
                          <li class="list-group-item">Noviembre</li>
                          <li class="list-group-item active">Diciembre</li>
                        </ul>
                @endswitch
                <h4>Ciclo (for)</h4>
                <nav>
                <ul class="pagination pagination-sm justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    @for ($i=1; $i <=100 ; $i++)
                        @if ($i % 10 == 0)
                            @if($i == 50)
                                <li class="page-item active"><a class="page-link" href="#">{{$i}}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="#">{{$i}}</a></li>
                            @endif
                        @endif
                    @endfor
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
            </div>
        </div>
    </div>
</div>