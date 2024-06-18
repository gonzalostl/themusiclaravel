@extends('layouts.app2')

<link rel="stylesheet" href="/css/edit.css">

<body>
<aside id="sidebar">

<ul>
    <li>
        <img src="/imagen/logothemusic.png" class="logo" width="40%">
    </li>
    <li><a href="{{ route('home') }}" class="menu-item active"><i class="fas fa-home"></i> Inicio</a></li>          
        <li><a href="{{ route('canciones.index') }}" class="menu-item"><i class="fas fa-music"></i> Canciones</a></li>
        <li><a href="{{route('generos.index')}}" class="menu-item"><i class="fas fa-list"></i> Géneros</a></li>
        <li><a href="{{ route('artistas.index') }}" class="menu-item"><i class="fas fa-list"></i> Artistas</a></li>
        <li><a href="{{route('users.index')}}" class="menu-item"><i class="fas fa-user"></i> Usuarios</a></li>
</ul>
<ul>
    <li>    <a href="{{route('logout')}}" class="menu-item">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </a></li>
</ul>


</aside>
<div class="content">
    <div class="form-container">
        <h1>Editar Canción</h1>
        <form action="{{ route('canciones.update', $cancion->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="{{ $cancion->nombre }}" required>
            </div>

            <div>
                <label for="artista">Artista:</label>
                <input type="text" name="artista" value="{{ $cancion->artista }}" required>
            </div>

            <div>
                <label for="duracion">Duración:</label>
                <input type="number" name="duracion" value="{{ $cancion->duracion }}" required>
            </div>

            <div>
        <label>Subir imagen</label>
        <div>
            <label>
                <input type="file" name="imagen" id="imagen" src="/portada/{{ $cancion->imagen }}" class="hidden"/>
            </label>
        </div>
    </div>
            <button type="submit">Actualizar</button>
        
        </form>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) { 
        $('#imagen').change(function () { 
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
         });
     });
</script>