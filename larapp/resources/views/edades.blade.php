<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Challenge</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
    <body>
    <div class="container-fluid">
    <div class="row mt-5">
<div class="col-md-8 offset-md-2">
<table class="table table-striped table-hover table-dark">
@foreach ($rs as $r)
<tr>
<td>
{{ $r }}
</td>
</tr>
@endforeach
</table>
</div>
</div>
</div>
</body>
</html>