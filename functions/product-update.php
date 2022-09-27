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

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precioCompra = $_POST['precioCompra'];
$precioVenta = $_POST['precioVenta'];

$sql_update_producto="UPDATE producto SET  codigo='$codigo',nombre='$nombre',descripcion='$descripcion',stock='$stock',precioVenta = '$precioVenta', precioCompra = '$precioCompra' WHERE (codigo='$codigo')";
$query_update_producto=mysqli_query($con,$sql_update_producto);

    if($query_update_producto){
        Header("Location: ../html/products.php");
    }
?>
