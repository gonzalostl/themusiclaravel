
@extends('layouts.app')

@section('content')
<h1>Crear nueva cancion</h1>

<form method="POST" action="{{ route('canciones.store') }}">
    @csrf

    <div>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" required>
    </div>

    <div>
        <label for="artista">Artista</label>
        <input id="artista" type="text" name="artista" required>
    </div>

    <div>
        <label for="duracion">Duracion (segundos)</label>
        <input id="duracion" type="number" name="duracion" required>
    </div>

    <button type="submit">Crear canción</button>
</form>
@endsection