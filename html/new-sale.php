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
$sql_product = "SELECT codigo,nombre,descripcion,stock,precioVenta FROM producto ";
$query_product = mysqli_query($con, $sql_product);
$row = mysqli_fetch_array($query_product);
?>
<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Nueva Venta</title>
</head> 
<body style="height: 70vh;" class="" >
    <header class="bg-secondary h-25 d-flex justify-content-center align-items-center">
    <h1>Sistema de Ventas</h1>
        <img src="../assets/logo/Akatsuki-Logo-PNG-Pic.png" alt="" class="h-100 w-auto mx-4">
    </header>


    <div>
        <h1 class="text-center">Nueva Venta</h1>
    </div>
    <div class = "container mt-5 d-flex">
    <div class = "container col4-4">
    <form  action ="../functions/product-register.php" class=" px-5 mx-auto" method ="POST" >
    <div class="mb-3">     
            <label class="form-label" for="">Ingrese el CODIGO del Producto</label>
            <input class="form-control" type="text" name="codigo" id="">       
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese el Nombre del Producto</label>
            <input class="form-control" type="text" name="nombre" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese la descripcion</label>
            <input class="form-control" type="text" name="descripcion" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese el Stock</label>
            <input class="form-control" type="number" name="stock" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese precio de Venta</label>
            <input class="form-control" type="number" name="precioCompra" id="">           
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Ingrese precio de Compra</label>
            <input class="form-control" type="number" name="precioVenta" id="">           
        </div>
        
     
          <input type="submit" class="btn btn-primary mb-3 col-5" value = "Agregar Producto"></input>
          <a href="main.php" class="btn btn-danger mb-3 col-5">Cancelar</a>
            
      </form>
      </div>
      <div class="container mt-5">
      <div class="col-md-8">
                <table class="table" >  
                    <thead class="table-success table-striped" >
                    
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>STOCK</th>
                            <th>PRECIO </th>
                            <th>CANTIDAD</th>
                            <th></th>
                                </tr>
                    </thead>

                    <tbody>
                        <?php
                             while($row=mysqli_fetch_array($query_product)){
                        ?>
                        <tr>
                            <td><?php  echo $row['codigo']?></th>
                            <td><?php  echo $row['nombre']?></td>
                            <td><?php  echo $row['descripcion']?></th>
                            <td><?php  echo $row['stock']?></td>   
                            <td><?php  echo $row['precioVenta']?></td>  
                            <th><input type="number" name="cantidad" id=""></th>
                            <th><a href="../functions/product-delete.php?codigo=<?php echo $row['codigo'] ?>" class="btn btn-success">Agregar</a></th>                                                   
                            </tr>
                            <?php 
                                }
                            ?>
                            </tbody>
                            </table>
        </div>
    <div class="col-md-8">
            <table class="table" >  
                <thead class="table-success table-striped" >
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                            <th></th>
                            <th></th>
                                </tr>
                    </thead>

                    <tbody id = "content">
                        
                    </tbody>
                    </table>
                </div> 
                <a href="../functions/product-delete.php?codigo=<?php echo $row['codigo'] ?>" class="btn btn-success">COMPRAR</a>                      
            </div>                     
        </div>
       
</body>
</html>