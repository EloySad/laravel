@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h1>Crear Usuario</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="names" class="form-label">Nombres</label>
        <input type="text" id="names" name="names" class="form-control" value="{{ old('names') }}" required>
    </div>
    <div class="mb-3">
        <label for="lastnames" class="form-label">Apellidos</label>
        <input type="text" id="lastnames" name="lastnames" class="form-control" value="{{ old('lastnames') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Género</label>
        <select id="gender" name="gender" class="form-select" required>
            <option value="" disabled selected>Selecciona un género</option>
            <option value="Male">Masculino</option>
            <option value="Female">Femenino</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Dirección</label>
        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>
    <div class="mb-3">
        <label for="countries_id" class="form-label">País</label>
        <select id="countries_id" name="countries_id" class="form-select" required>
            <option value="" disabled selected>Selecciona un país</option>
            @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
