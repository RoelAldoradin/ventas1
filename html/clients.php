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
$sql_client = "SELECT idCliente,nombre,apellido,telefono,correo,direccion FROM cliente ";
$query_client = mysqli_query($con, $sql_client);
$row = mysqli_fetch_array($query_client);
?>
<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Clientes</title>
</head> 
<body style="height: 70vh;" >
    <a href="">

    </a>
    <header class="bg-secondary h-25 d-flex justify-content-center align-items-center fondo-header" >
    <h1>Sistema de Ventas</h1>
        <img src="../assets/logo/Akatsuki-Logo-PNG-Pic.png" alt="" class="h-100 w-auto mx-4">
    </header>
    <div class="container mt-5">
        <div class="">
    <div>
        <h1 class="text-center">Clientes</h1>
        <h2 class="text-center mb-3" >Nuevo Cliente</h2>
    </div>
    <form  action ="../functions/client-register.php" class="col-4 px-5 mx-auto" method ="POST" >

        <div class="mb-3">
            <label class="form-label" for="">Ingrese el Nombre del Cliente</label>
            <input class="form-control" type="text" name="nombre" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese los Apellidos</label>
            <input class="form-control" type="text" name="apellidos" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese el Telefono</label>
            <input class="form-control" type="telephone" name="telefono" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese el correo</label>
            <input class="form-control" type="text" name="correo" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese la direccion</label>
            <input class="form-control" type="text" name="direccion" id="">           
        </div>
        
     
          <input type="submit" class="btn btn-primary mb-3 col-5" value = "Agregar Cliente"></input>
          <a href="main.php" class="btn btn-danger mb-3 col-5">Cancelar</a>
            
      </form>
      <div class="col-md-8">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>IDCLIENTE</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOS</th>
                            <th>TELEFONO</th>
                            <th>CORREO</th>
                            <th>DIRECCION</th>
                            <th></th>
                            <th></th>
                                </tr>
                    </thead>

                    <tbody>
                        <?php
                             while($row=mysqli_fetch_array($query_client)){
                        ?>
                        <tr>
                            <td><?php  echo $row['idCliente']?></th>
                            <td><?php  echo $row['nombre']?></th>
                            <td><?php  echo $row['apellido']?></td>
                            <td><?php  echo $row['telefono']?></th>
                            <td><?php  echo $row['correo']?></td>   
                            <td><?php  echo $row['direccion']?></td>  
                            <th><a href="update-client.php?idCliente=<?php echo $row['idCliente'] ?>" class="btn btn-info">Editar</a></th>
                            <th><a href="../functions/client-delete.php?idCliente=<?php echo $row['idCliente'] ?>" class="btn btn-danger">Eliminar</a></th>                                                   
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