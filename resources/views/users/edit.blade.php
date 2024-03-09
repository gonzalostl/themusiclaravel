
@extends('layouts.app')

@section('content')
<h1>Editar Usuario</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="name" value="{{ $user->name }}"> <br>
    <label for="correo">Correo:</label>
    <input type="email" name="email" value="{{ $user->email }}"> <br>
    <label for="contraseña">Contraseña:</label>
    <input type="text" name="contraseña" value="{{ $user->password }}"> <br>
    <button type="submit">Actualizar</button>
</form>
@endsection