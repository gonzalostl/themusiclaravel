
@extends('layouts.app2')

<h1>Crear nueva cancion</h1>

<form method="POST" action="{{ route('canciones.store') }}">
    @csrf

    <div>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" required>
    </div>

    <div>
        <label for="artista">Artista</label>
        <input id="artista" type="text" name="artista" required>
    </div>

    <div>
        <label for="duracion">Duracion (segundos)</label>
        <input id="duracion" type="number" name="duracion" required>
    </div>

<!-- -->   <div>
        <img id="imagenSeleccionada" style="max-height: 300px;">
    </div>

 <div>
        <label>Subir imagen</label>
        <div>
            <label>
                <input type="file" name="imagen" id="imagen" class="hidden"/>
            </label>
        </div>
    </div>
    <button type="submit">Crear canción</button>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!----><script>
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