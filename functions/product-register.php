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
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precioVenta = $_POST['precioVenta'];
$precioCompra = $_POST['precioCompra'];
$idCategoria = 6;


$sql_insert_product = "INSERT INTO producto  VALUES ('','$codigo','$nombre','$descripcion','$stock','$precioVenta','$precioCompra',6)";

$query_insert_product = mysqli_query($con,$sql_insert_product);
if($query_insert_product){
    Header("Location:../html/products.php");
}else{
    
}

?>