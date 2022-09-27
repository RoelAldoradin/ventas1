<?php

session_start();
error_reporting(0);
$varsesion = $_SESSION['user'];
if($varsesion == null || $varsesion ==''){
    echo'DEBE INICIAR SESION ANTES DE CONTINUAR';
    die();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Principal</title>
</head>
<body style="height: 70vh;" class="" >
    
    <header class="bg-secondary h-25 d-flex justify-content-center align-items-center">
    <h1>Sistema de Ventas</h1>
        <img src="../assets/logo/Akatsuki-Logo-PNG-Pic.png" alt="" class="h-100 w-auto mx-4">
    </header>
    <div class="container-md  mt-5 d-flex  justify-content-around h-25">
        <a href="../carrito-master/index.php" class="h-100"><img src="../assets/img-main/add-to-cart.png "alt="" class="h-100 w-auto">Nueva Venta</a>
        <a href="#" class="h-100"><img src="../assets/img-main/cheque.png "alt="" class="h-100 w-auto">Comprobantes</a>
        <a href="../html/products.php" class="h-100"><img src="../assets/img-main/inventario.png "alt="" class="h-100 w-auto">Productos</a>
    </div>
    <div class="container-md  mt-5 d-flex  justify-content-around h-25">
        <a href="../html/sign-in.php" class="h-100"><img src="../assets/img-main/user.png"alt="" class="h-100 w-auto">Nuevo Usuario</a>
        <a href="../html/clients.php" class="h-100"><img src="../assets/img-main/compras.png "alt="" class="h-100 w-auto">Clientes</a>
        <a href="#" class="h-100"><img src="../assets/img-main/add-to-cart.png "alt="" class="h-100 w-auto">Comprobantes</a>
    </div>
    <div class = "container-md  mt-5 d-flex  justify-content-around ">
        <a href="../functions/close-session.php" class = "btn btn-danger mx-auto mt-5">CERRAR SESION</a>
    </div>
    <h2 class = "text-center">DESARROLLADOS NUEVA VENTA - NUEVO USUARIO - CLIENTES - PRODUCTOS</h2>
    <h2 class = "text-center">SE AH DESARROLADO EN CONTROL DE SESIONES EH IMPLEMENTADO EL MODULO VENTA AL 90% </h2>
</body>
</html>