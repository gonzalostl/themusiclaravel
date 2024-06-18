


@extends('layouts.app2')


<link rel="stylesheet" href="/css/ver.css">

<body>    

<aside id="sidebar">

<ul>
        <li>
            <img src="/imagen/logothemusic.png" class="logo" width="40%">
        </li>
        <li><a href="{{ route('home') }}" class="menu-item "><i class="fas fa-home"></i> Inicio</a></li>          
            <li><a href="{{ route('canciones.index') }}" class="menu-item "><i class="fas fa-music"></i> Canciones</a></li>
            <li><a href="{{route('generos.index')}}" class="menu-item"><i class="fas fa-list"></i> Géneros</a></li>
            <li><a href="{{ route('artistas.index') }}" class="menu-item active"><i class="fas fa-list"></i> Artistas</a></li>
            <li><a href="{{route('users.index')}}" class="menu-item"><i class="fas fa-user"></i> Usuarios</a></li>
    </ul>
</aside>

<div class="main-content">
        <main class="content">
        <div class="details">
            
<h2>DETALLES</h2>
<p>Id: {{ $artistas->id }}</p>
<p>Nombre: {{ $artistas->Nombre }}</p>
<p>Nombre Artistico: {{ $artistas->NombreArt }}</p>
<p>Descripcion: {{ $artistas->Descripcion }}</p>
<p>Foto: </p>
            <img src="/portada/{{ $artistas->Foto }}" alt="">
        </div></main>
    </div>

</body>
