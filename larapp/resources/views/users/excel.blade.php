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
    @foreach($users as $user)
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
