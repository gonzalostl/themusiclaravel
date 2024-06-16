

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/registro.css">
</head>
<body>
   <main class="container align-center p-5">
    <h1>REGISTRO</h1>
    <form action="{{route('validar-registro')}}" method="post">
        @csrf
    <div class="mb-3">
        <input type="email" class="form-control" id="emailInput"
        name="email" placeholder="Email" required autocomplete="disable">
        <i class='bx bxs-user'></i>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="passwordInput" placeholder="Contraseña" name="password" required>
        <i class='bx bxs-user'></i>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="userInput" placeholder="Nombre" name="name" required autocomplete="disable">
        <i class='bx bxs-user'></i>
    </div>

    <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
   </main> 
</body>
</html>