<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Usuarios</title>
	<style>
		table {
			border: 1px solid #aaa;
			border-collapse: collapse;
		}
		table th, table td {
			font-family: sans-serif;
			font-size: 10px;
			border: 1px solid #ccc;
			color: #333;
			padding: 4px;
		}
		table tr:nth-child(odd) {
			background-color: #eee;
		}
		table th {
			background-color: #666;
			color: #fff;
			text-align: center;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NOMBRE COMPLETO</th>
				<th>CORREO ELECTRÓNICO</th>
				<th>TELÉFONO</th>
				<th>FECHA NACIMIENTO</th>
				<th>FOTO</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>{{ $user->fullname}}</td>
					<td>{{ $user->email}}</td>
					<td>{{ $user->phone}}</td>
					<td>{{ $user->birthdate}}</td>
					<td><img src="{{ public_path().'/'.$user->photo }}" width="40px"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>