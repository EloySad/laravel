@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Listado de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>País</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->names }} {{ $user->lastnames }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->country->name }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No hay usuarios registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
