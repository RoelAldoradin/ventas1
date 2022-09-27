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

$codigo=$_GET['codigo'];

$sql="SELECT codigo,nombre,descripcion,stock,precioVenta,precioCompra FROM producto WHERE codigo='$codigo'";
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
                    <form action="../functions/product-update.php" method="POST">                   
                                <h2>Producto</h2>
                                <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo" value="<?php echo $row['codigo']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="descripcion" value="<?php echo $row['descripcion']  ?>">
                                <input type="number" class="form-control mb-3" name="stock" placeholder="Stock" value="<?php echo $row['stock']  ?>">                            

                                <input type="number" class="form-control mb-3" name="precioVenta" placeholder="Precio Venta" value="<?php echo $row['precioVenta']  ?>">

                                <input type="number" class="form-control mb-3" name="precioCompra" placeholder="Precio Compra" value="<?php echo $row['precioCompra']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>