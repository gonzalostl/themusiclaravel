<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    integrity="sha384-0evHe/X+R7YKIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
   <main class="container align-center p-5">
    <form action="{{route('inicio-sesion')}}" method="post">
        @csrf
    <div class="mb-3">
        <label for="emailInput" class="form-label">Email</label>
        <input type="email" class="form-control" id="emailInput"
        name="email" required >
    </div>
    <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordInput" name="password" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
        <label for="rememberCheck" class="form-check-label">Mantener sesión iniciada</label>
    </div>
    <div>
        <p>¿No tienes cuenta? <a href="{{route('registro')}}">
            Registrate
        </a></p>
    </div>
    <button type="submit" class="btn btn-primary">Acceder</button>
    </form>
   </main> 
</body>
</html>