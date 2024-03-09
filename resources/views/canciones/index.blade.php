@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
    <div class="col-md-3 text-end ">
        <a href="{{route('logout')}}">
            <button type="button" class="btn btn-online-primary me-2">Salir</button>
        </a>
    </div>
        <div class="card">
            
            <div class="card-header">Canciones</div>
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

@endsection