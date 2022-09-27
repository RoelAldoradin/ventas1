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

$idCliente_delete=$_GET['idCliente'];

$sql_delete_client="DELETE FROM cliente  WHERE idCliente ='$idCliente_delete'";
$query_delete=mysqli_query($con,$sql_delete_client);

    if($query_delete){
        Header("Location:../html/clients.php");
    }
?>