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

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];


$sql_insert_client = "INSERT INTO cliente  VALUES ('','$nombre','$apellido','$telefono','$correo','$direccion')";

$query_insert_client = mysqli_query($con,$sql_insert_client);
if($query_insert_client){
    Header("Location:../html/clients.php");
}else{
    
}

?>