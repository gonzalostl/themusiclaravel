@extends('layouts.app')

@section('content')
<h2>Detalles de tu usuario</h2>
<p>Id: {{ $user->id }}</p>
<p>Nombre: {{ $user->name }}</p>
<p>Correo: {{ $user->email }}</p>
<p>Contraseña: {{ $user->password }}</p>
@endsection