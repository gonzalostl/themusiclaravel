@extends('layouts.app')

@section('content')
<h1>Editar Género</h1>
<form action="{{ route('generos.update', $genero->id) }}" method="POST" enctype="multipart/form-data ">
    @csrf
    @method('PUT')
    <label for="genero">Género:</label>
    <input type="text" name="genero" value="{{ $genero->genero }}"> <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" value="{{ $genero->descripcion }}"> <br>
    <div>
        <label>Subir imagen</label>
        <div>
            <label>
                <div>
                    <p>Seleccione la imagen</p>
                </div>
                <input type="file" name="portada" id="portada" class="hidden"/>
            </label>
        </div>
    </div>


    <button type="submit">Actualizar</button>
</form>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) { 
        $('#portada').change(function () { 
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
         });
     });
</script>