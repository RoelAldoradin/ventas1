
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head> 
<body style="height: 70vh;">

<header class="bg-secondary h-25 d-flex justify-content-center align-items-center">
        <h1>Sistema de Ventas</h1>
        <img src="assets/logo/Akatsuki-Logo-PNG-Pic.png" alt="" class="h-100 w-auto mx-4">
    </header>
<div class="container mt-5">    
<div class="row"> 

    <div>
        <h1 class="text-center">LOGIN VENTAS</h1>

    </dib>
    <form action ="functions/login.php" class="col-4 px-5 mx-auto" method="POST" >
        <div class="mb-3">
          <label for="" class="form-label">Ingrese su nombre de Usuario</label>
          <input type="text" class="form-control" name ="usuario">
          <div id="emailHelp" class="form-text">Nunca compartiremos tu nombre de usuario con nadie más.
            </div>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Ingrese su contraseña</label>
          <input type="password" class="form-control" name = "contrasenia" >
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Mostrar</label>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </form>
      </div>
</div>
</body>
</html>