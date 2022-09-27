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

$dni_delete=$_GET['dni'];

$sql_delete_user="DELETE FROM usuario  WHERE dni='$dni_delete'";
$query_delete=mysqli_query($con,$sql_delete_user);

    if($query_delete){
        Header("Location:../html/sign-in.php");
    }
?>