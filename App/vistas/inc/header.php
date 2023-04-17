<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>../css/estilos.css">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Proyecto</title>
</head>
<header>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light text-black">
  <div class="container-fluid text-dark">
    
  <a class="navbar-brand fw-bold " href="https://cpifpbajoaragon.com/"><img style="width:30px;"src="<?php echo RUTA_URL?>../imagenes/logo1.png"> CPIFP BAJO ARAGON</a>

  <a title="Cerrar sesion" href="<?php echo RUTA_URL?>/login/logout" class=" nav-link"><i class="bi bi-box-arrow-left" style="width:200%;"></i> <strong><?php echo $datos['usuarioSesion']->nombreUser?></strong></a>
  </div>
 
  <!-- <div class="dropdown">
  <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-person-circle"></i>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div> -->

</nav>

<!-- Navbar -->
</header>  
<body class="bg-white">
