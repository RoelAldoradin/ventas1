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

$codigo_delete=$_GET['codigo'];

$sql_delete_product="DELETE FROM producto  WHERE codigo ='$codigo_delete'";
$query_delete=mysqli_query($con,$sql_delete_product);

    if($query_delete){
        Header("Location:../html/products.php");
    }
?>