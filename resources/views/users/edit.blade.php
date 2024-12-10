@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h1>Editar Usuario</h1>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="names" class="form-label">Nombres</label>
        <input type="text" id="names" name="names" class="form-control" value="{{ old('names', $user->names) }}" required>
    </div>
    <div class="mb-3">
        <label for="lastnames" class="form-label">Apellidos</label>
        <input type="text" id="lastnames" name="lastnames" class="form-control" value="{{ old('lastnames', $user->lastnames) }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
    </div>
    <div class="mb-3">
        <label for="country_id" class="form-label">País</label>
        <select id="country_id" name="country_id" class="form-select" required>
            @foreach($countries as $country)
            <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
