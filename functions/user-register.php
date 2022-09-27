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
$nombre = $_POST['nombreUsuario'];
$apellidoP = $_POST['apellidoPaterno'];
$apellidoM = $_POST['apellidoMaterno'];
$dni = $_POST['dni'];
$direccion = $_POST['dirUsuario'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telUsuario'];
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$sql_insert_user = "INSERT INTO usuario VALUES ('','$nombre','$apellidoP','$apellidoM','$dni','$direccion','$sexo','$telefono','ACTIVO','$usuario','$contrasenia',13)";

$query_insert_user = mysqli_query($con,$sql_insert_user);
if($query_insert_user){
    Header("Location:../html/sign-in.php");
}else{
    
}

?>