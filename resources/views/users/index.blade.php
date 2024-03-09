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
            
            <div class="card-header">Usuarios</div>
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo usuario</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Contraseña</th>
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

                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

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

@endsection