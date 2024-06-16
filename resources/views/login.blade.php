
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/iniciosesion.css">
</head>

<body>
   <main class="container align-center p-5">
   <h1>Iniciar Sesión</h1>
    <form action="{{route('inicio-sesion')}}" method="post">
        @csrf
    <div class="mb-3">
        <input type="email" placeholder="Email" class="form-control" id="emailInput"
        name="email" required >
        <i class='bx bxs-user'></i>
    </div>
    <div class="mb-3">
        <input type="password" placeholder="Contraseña" class="form-control" id="passwordInput" name="password" required>
        <i class='bx bxs-user'></i>
    </div>
    <div class="form-check">
       <label for="rememberCheck" class="form-check-label"> <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
        Mantener sesión iniciada</label>
    </div>
    
    <button type="submit" class="btn btn-primary">Acceder</button>
    <div class="register-link">
        <p>¿No tienes cuenta? 
            <a href="{{route('registro')}}">Registrate</a>
        </p>
    </div>
    </form>
   </main> 
</body>   
</html>