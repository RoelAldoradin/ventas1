<?php

include("../conexion/conexion.php");
$con = conectar();
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$sql_login_user = "SELECT estado FROM usuario WHERE usuario ='$usuario' AND contraseña = '$contrasenia' ";
$query_login_user = mysqli_query($con,$sql_login_user);
$result =  mysqli_fetch_array($query_login_user);

if($result){
    Header("Location:../html/main.php");
    session_start();
    $_SESSION['user'] = $usuario;
}else{
    echo '<script>alert("CREDENCIALES INCORRECTAS")</script>';
    Header("Location:../index.php");
}
