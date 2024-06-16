@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/ver.css">

<body>    

<h2>DETALLES</h2>
<p>Id: {{ $cancion->id }}</p>
<p>Nombre: {{ $cancion->nombre }}</p>
<p>Artista: {{ $cancion->artista }}</p>
<p>Duracion: {{ $cancion->duracion }}</p>

</body>
@endsection