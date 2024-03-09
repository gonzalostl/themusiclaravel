
@extends('layouts.app')

@section('content')
<h1>Editar Cancion</h1>
<form action="{{ route('canciones.update', $cancion->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $cancion->nombre }}"> <br>
    <label for="artista">Artista:</label>
    <input type="text" name="artista" value="{{ $cancion->artista }}"> <br>
    <label for="duracion">Duracion:</label>
    <input type="number" name="duracion" value="{{ $cancion->duracion }}"> <br>
    <button type="submit">Actualizar</button>
</form>
@endsection