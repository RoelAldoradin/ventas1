<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if($varsesion == null || $varsesion ==''){
    echo'DEBE INICIAR SESION ANTES DE CONTINUAR';
    die();
}


include("../conexion/conexion.php");
$con = conectar();
$sql_user = "SELECT dni,nombre,apellidoPaterno,apellidoMaterno,sexo,usuario FROM usuario ";
$query = mysqli_query($con, $sql_user);
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Sign In</title>
</head> 
<body style="height: 70vh;" >
    <header class="bg-secondary h-25 d-flex justify-content-center align-items-center">
    <h1>Sistema de Ventas</h1>
        <img src="../assets/logo/Akatsuki-Logo-PNG-Pic.png" alt="" class="h-100 w-auto mx-4">
    </header>
    <div class="container mt-5">
        <div class="">
    <div>
        <h1 class="text-center">USUARIOS</h1>
        <h2 class="text-center mb-3" >Nuevo Usuario</h2>
    </div>
    <form  action ="../functions/user-register.php" class="col-4 px-5 mx-auto" method ="POST" >
        <div class="mb-3">
            <label class="form-label" for="">Ingrese su nombre</label>
            <input class="form-control" type="text" name="nombreUsuario" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese su apellido Paterno</label>
            <input class="form-control" type="text" name="apellidoPaterno" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese su apellido Materno</label>
            <input class="form-control" type="text" name="apellidoMaterno" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese DNI</label>
            <input class="form-control" type="text" name="dni" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese su Direccion</label>
            <input class="form-control" type="text" name="dirUsuario" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Sexo</label>
            <input class="form-control" type="text" name="sexo" id="">           
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="">Ingrese telefono</label>
            <input class="form-control" type="telephone" name="telUsuario" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Usuario</label>
            <input class="form-control" type="text" name="usuario" id="">         
              
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Contraseña</label>
            <input class="form-control" type="password" name="contrasenia" id="">         
              
        </div>
     
          <input type="submit" class="btn btn-primary mb-3 col-5" value = "Registrarse"></input>
          <a href="main.php" class="btn btn-danger mb-3 col-5">Cancelar</a>
            
      </form>
      <div class="col-md-8">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>DNI</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO PATERNO</th>
                            <th>APELLIDO MATERNO</th>
                            <th>SEXO</th>
                            <th>USUARIO</th>
                            <th></th>
                            <th></th>
                                </tr>
                    </thead>

                    <tbody>
                        <?php
                             while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php  echo $row['dni']?></th>
                            <td><?php  echo $row['nombre']?></td>
                            <td><?php  echo $row['apellidoPaterno']?></th>
                            <td><?php  echo $row['apellidoMaterno']?></td>   
                            <td><?php  echo $row['sexo']?></td>  
                            <td><?php  echo $row['usuario']?></th>    
                            <th><a href="update-user.php?dni=<?php echo $row['dni'] ?>" class="btn btn-info">Editar</a></th>
                            <th><a href="../functions/user-delete.php?dni=<?php echo $row['dni'] ?>" class="btn btn-danger">Eliminar</a></th>                                                   
                            </tr>
                            <?php 
                                }
                            ?>
                            </tbody>
                            </table>
                                </div>
                    </div>
        </div>
</body>
</html>