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

$nombre = $_POST['nombreUsuario'];
$apellidoP = $_POST['apellidoPaterno'];
$apellidoM = $_POST['apellidoMaterno'];
$dni = $_POST['dni'];
$direccion = $_POST['dirUsuario'];
$telefono = $_POST['telUsuario'];
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$sql="UPDATE usuario SET  dni='$dni',nombre='$nombre',apellidoPaterno='$apellidoP',apellidoMaterno='$apellidoM',direccion = '$direccion', telefono = '$telefono', usuario = '$usuario',contraseña = '$contrasenia' WHERE dni='$dni'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../html/sign-in.php");
    }
?>