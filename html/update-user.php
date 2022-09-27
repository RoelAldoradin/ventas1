<?php 

session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if($varsesion == null || $varsesion ==''){
    echo'DEBE INICIAR SESION ANTES DE CONTINUAR';
    die();
}


    include("../conexion/conexion.php");
    $con=conectar();

$dni=$_GET['dni'];

$sql="SELECT dni,nombre,apellidoPaterno,apellidoMaterno,direccion,telefono,usuario,contraseña FROM usuario WHERE dni='$dni'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="../functions/user-update.php" method="POST">                   
                                <h2>Datos del Usuario</h2>
                                <input type="text" class="form-control mb-3" name="dni" placeholder="Dni" value="<?php echo $row['dni']  ?>">
                                <input type="text" class="form-control mb-3" name="nombreUsuario" placeholder="Nombres" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidoPaterno" placeholder="Apellido Paterno" value="<?php echo $row['apellidoPaterno']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidoMaterno" placeholder="Apellido Materno" value="<?php echo $row['apellidoMaterno']  ?>">                            

                                <input type="text" class="form-control mb-3" name="dirUsuario" placeholder="Direccion" value="<?php echo $row['direccion']  ?>">

                                <input type="telephone" class="form-control mb-3" name="telUsuario" placeholder="Telefono" value="<?php echo $row['telefono']  ?>">

                                <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario" value="<?php echo $row['usuario']  ?>">

                                <input type="password" class="form-control mb-3" name="contrasenia" placeholder="Contraseña" value="<?php echo $row['contraseña'] ?>">
                                
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>