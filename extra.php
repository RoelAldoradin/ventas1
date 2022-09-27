<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Ventas</title>
</head>
<body>
    <header class="sticky-sm-top">
        <h1 class="text-center bg-light mb-0">Pagina Web Ventas</h1>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navegacion</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                  </li>
                  
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ">Ofertas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ">Nosotros</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Buscar</button>
                  <a class="btn btn-primary mx-3" href="./html/login.php" >Ingresar</a>
                  <a class="btn btn-success" href="./html/sign-in.php">Registrarse</a>
                </form>
              </div>
            </div>
          </nav>
    </header>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="./assets/img/top-mujer.jpg" class="d-block w-25 mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Ultimos en Stock</h5>
              <p>Producto con mayor numero de ventas</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./assets/img/pantalon-mujer.jpg" class="d-block w-25 mx-auto p-2" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Prenda de verano</h5>
              <p>Lo mejor de lo mejor.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/pantalon-mujer2.webp" class="d-block w-25 mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5></h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <h2 class="text-center">Nuestros Productos</h2>
    <div class="d-flex justify-content-around my-4">
        <div class="card" style="width: 18rem;">
            <img src="./assets/img/2069918.webp" class="card-img-top w-75 mx-auto py-4" alt="...">
            <div class="card-body">
              <h5 class="card-title">Pantalon Mujer</h5>
              <p class="card-text">Pantalon para Mujer Jean diferentes tallas</p>
              <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./assets/img/img-1.webp" class="card-img-top w-75 mx-auto py-4" alt="...">
            <div class="card-body">
              <h5 class="card-title">Top Mujer</h5>
              <p class="card-text">Top para Mujer diferentes tallas</p>
              <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="./assets/img/pantalon-mujer2.webp" class="card-img-top w-75 mx-auto py-4" alt="...">
            <div class="card-body">
              <h5 class="card-title">Camisa Mujer</h5>
              <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
              <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
            </div>
          </div>
          </div>
          <div class="d-flex justify-content-around my-4">
            <div class="card" style="width: 18rem;">
                <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Camisa Mujer</h5>
                  <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                  <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Camisa Mujer</h5>
                  <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                  <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                </div>
              </div>
              <div class="card" style="width: 18rem;">
                <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Camisa Mujer</h5>
                  <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                  <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                </div>
              </div>
              </div>
              <div class="d-flex justify-content-around my-4">
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Camisa Mujer</h5>
                      <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                      <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                    </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Camisa Mujer</h5>
                      <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                      <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                    </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/camisa_mujer.jpg" class="card-img-top w-75 mx-auto" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Camisa Mujer</h5>
                      <p class="card-text">Camisa para Mujer color celeste diferentes tallas</p>
                      <a href="#" class="btn btn-primary col-5 mx-auto" >Comprar</a>
                    </div>
                  </div>
                  </div>

      <footer class="hs-25">
      </footer>

</body>
</html>