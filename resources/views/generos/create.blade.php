
@extends('layouts.app2')


<h1>Crear nuevo género</h1>

<form method="POST" action="{{ route('generos.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="genero">Género</label>
        <input id="genero" type="text" name="genero" required>
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <input id="descripcion" type="text" name="descripcion" required>
    </div>

    <div>
        <img id="imagenSeleccionada" style="max-height: 300px;">
    </div>

    <div>
        <label>Subir imagen</label>
        <div>
            <label>
                <input type="file" name="portada" id="portada" class="hidden"/>
            </label>
        </div>
    </div>

    <a href="{{ route('generos.index')}}">Cancelar</a>
    <button type="submit">Crear género</button>
</form>




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