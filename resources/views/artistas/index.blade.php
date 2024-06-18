@extends('layouts.app2')

<link rel="stylesheet" href="/css/art.css">
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
    <ul>
        <li>    <a href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a></li>
    </ul>
</aside>

<div class="content">
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Artistas</div>
                <div class="col-md-6 text-end">
                    <form action="{{ route('artistas.index') }}" method="GET" class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Buscar Canción" aria-label="Buscar" name="search">
                            <button class="btn btn-outline-success my-2 my-sm-0 search-button" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <a href="{{ route('artistas.create') }}" class="btn btn-success btn-sm my-2 new-genre-button"><i class="fas fa-plus-circle"></i> Nuevo Artista</a>
                    <div class="genre-grid">
                    @foreach ($artistas as $artista)
                        <div class="genre-card">
                            <img src="/portada/{{ $artista->Foto }}" class="genre-image">
                            <div class="genre-info">
                                <h2>{{ $artista->NombreArt }}</h2>

                                <div class="dropdown">
                                    <button class="dropbtn"><i class="fas fa-ellipsis-v"></i></button>
                                    <div class="dropdown-content">
                                        <a href="{{ route('artistas.show', $artista->id) }}"><i class="fas fa-eye"></i> Ver</a>
                                        <a href="{{ route('artistas.edit', $artista->id) }}"><i class="fas fa-pencil-square"></i> Editar</a>
                                        <a href="#" onclick="event.preventDefault(); if(confirm('¿Quieres eliminar este artista?')) { document.getElementById('delete-form-{{ $artista->id }}').submit(); }"><i class="fas fa-trash"></i> Eliminar</a>
                                        <form id="delete-form-{{ $artista->id }}" action="{{ route('artistas.destroy', $artista->id) }}" method="post" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    document.querySelector('.show-search').addEventListener('click', function () {
        document.querySelector('.search-form').classList.toggle('active');
    });
</script>

</body>
