


<h1>Crear nuevo usuario</h1>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div>
        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" required>
    </div>

    <div>
        <label for="email">Correo</label>
        <input id="email" type="email" name="email" required>
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" required>
    </div>

    <button type="submit">Crear usuario</button>
</form>
