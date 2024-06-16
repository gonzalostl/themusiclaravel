@extends('layouts.app2')

<link rel="stylesheet" href="/css/generos.css">
<body>
<aside id="sidebar">

    <ul>
        <li>
            <img src="/imagen/logothemusic.png" class="logo" width="40%">
        </li>
        <li><a href="{{ route('home') }}" class="menu-item active"><i class="fas fa-home"></i> Inicio</a></li>          
            <li><a href="{{ route('canciones.index') }}" class="menu-item"><i class="fas fa-music"></i> Canciones</a></li>
            <li><a href="{{route('generos.index')}}" class="menu-item"><i class="fas fa-list"></i> Géneros</a></li>
            <li><a href="{{ route('playlists.index') }}" class="menu-item"><i class="fas fa-list"></i> Playlists</a></li>
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
                <div class="card-header">Canciones</div>
                <div class="col-md-6 text-end">
        <form action="{{ route('canciones.index') }}" method="GET" class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input class="form-control mr-sm-2 search-input" type="search" placeholder="Buscar Cancion" aria-label="Buscar" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0 search-button" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        
    </div>
                <div class="card-body">
                    <a href="{{ route('canciones.create') }}" class="btn btn-success btn-sm my-2 new-genre-button"><i class="fas fa-plus-circle"></i> Nueva Canción</a>
                    <div class="genre-grid">
                    @foreach ($canciones as $cancion)
    <div class="genre-card">
        <img src="/portada/20240616203825.jpg" class="genre-image">
        <div class="genre-info">
                <h2>{{ $cancion->nombre }}</h2>
                <td>{{ $cancion->artista }}</td>

            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-ellipsis-v"></i></button>
                <div class="dropdown-content">
                    <a href="{{ route('canciones.show', $cancion->id) }}"><i class="fas fa-eye"></i> Ver</a>
                    <a href="{{ route('canciones.edit', $cancion->id) }}"><i class="fas fa-pencil-square"></i> Editar</a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('¿Quieres eliminar esta canción?')) { document.getElementById('delete-form-{{ $cancion->id }}').submit(); }"><i class="fas fa-trash"></i> Eliminar</a>
                    <form id="delete-form-{{ $cancion->id }}" action="{{ route('canciones.destroy', $cancion->id) }}" method="post" style="display: none;">
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

<footer>
    <div class="audio-player">
        <audio controls>
            <source src="/css/ojosverdes.mp3" type="audio/mp3">
            
        </audio>
    </div>
</footer>
<script>
    // Script para mostrar el formulario de búsqueda en dispositivos móviles al hacer clic en el ícono de búsqueda
    document.querySelector('.show-search').addEventListener('click', function () {
        document.querySelector('.search-form').classList.toggle('active');
    });
</script>

</body>


<!--
<div class="content">
    <div class="titulo">
     <H1>CANCIONES</H1>
    </div>

   <div class="row justify-content-center mt-3">

     <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('canciones.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nueva Canción</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Artista</th>
                            <th scope="col">Duración</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($canciones as $cancion)
                        <tr>
                            <th scope="row">{{ $cancion->id }}</th>
                            <td>{{ $cancion->nombre }}</td>
                            <td>{{ $cancion->artista }}</td>
                            <td>{{ $cancion->duracion }}</td>
                            <td>
                                <form action="{{ route('canciones.destroy', $cancion->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('canciones.show', $cancion->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

                                    <a href="{{ route('canciones.edit', $cancion->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quieres eliminar esta canción?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

               </div>
           </div>
       </div>

    </div>
</div> 
 -->

