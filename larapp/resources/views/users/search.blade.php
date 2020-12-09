@forelse($users as $user)
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
@empty
    <tr>
		<td class="text-center" colspan="5">
			No hay Usuarios con este Nombre/Correo Electrónico.
		</td>
	</tr>
@endforelse