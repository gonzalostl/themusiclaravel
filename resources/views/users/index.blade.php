@extends('layouts.app')


<link rel="stylesheet" href="/css/users.css">
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
            <li><a href="{{route('logout')}}" class="menu-item"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
        </ul>
    </aside>
    <div class="content">

        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Usuarios</div>
                    <div class="col-md-6 text-end">
        <form action="{{ route('users.index') }}" method="GET" class="form-inline my-2 my-lg-0">
            <div class="input-group">
                <input class="form-control mr-sm-2 search-input" type="search" placeholder="Buscar Usuario" aria-label="Buscar" name="search">
                <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        
    </div>
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo usuario</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                            
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quieres eliminar este usuario?');"><i class="bi bi-trash"></i> Eliminar</button>
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

    <script>
    // Script para mostrar el formulario de búsqueda en dispositivos móviles al hacer clic en el ícono de búsqueda
    document.querySelector('.show-search').addEventListener('click', function () {
        document.querySelector('.search-form').classList.toggle('active');
    });
</script>

</body>
