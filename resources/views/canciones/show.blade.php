@extends('layouts.app')

@section('content')
<h2>Detalles de cancion</h2>
<p>Id: {{ $cancion->id }}</p>
<p>Nombre: {{ $cancion->nombre }}</p>
<p>Artista: {{ $cancion->artista }}</p>
<p>Duracion: {{ $cancion->duracion }}</p>
@endsection