<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>../css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Proyecto</title>
  <style>


  </style>
</head>

<body onload="mueveReloj()" class="">


  <nav class="navbar navbar-expand-lg navbar-light bg-light text-black">
    <div class="container-fluid text-dark">
      <a class="navbar-brand fw-bold " href="https://cpifpbajoaragon.com/"><img style="width:30px;" src="<?php echo RUTA_URL ?>../imagenes/logo1.png"> CPIFP BAJO ARAGON</a>

      <a style="background-color:043b83; border-color:043b83;" href="<?php echo RUTA_URL ?>/login" id="menu-container" class="btn"><strong><i class="bi bi-door-open"></i> ACCEDER</strong></a>

    </div>


  </nav>
  <?php if (!$datos['publicacion']) : ?>
    <div class="container text-center mt-5">
      <h3>No hay publicaciones disponibles por el momento</h3>


    </div>
    <div class="container d-flex justify-content-center align-items-center mt-4">

      <form name="form_reloj" class="">
        <input type="text" name="reloj" class="shadow" id="reloj" size="10" onfocus="window.document.form_reloj.reloj.blur()">
      </form>
    <?php else : ?>

      <div class="container  mt-1">
        <div id="carouselExample" class="carousel rounded shadow slide bg-light text-dark">
          <div class="carousel-inner">
            <?php $contador = 0 ?>
            <?php foreach ($datos['publicacion'] as $publicacion) : ?>
              <?php if ($contador == 0) : ?>
                <div class="carousel-item active" data-bs-interval="7000">
                  <div class="pt-1">
                    <h2 class="text-center"><?php echo $publicacion->tituloPublic ?></h2>
                    <p class="text-center"><?php echo $publicacion->mensajePublic ?></p>
                  </Div>
                  <img src="<?php echo RUTA_URL ?>/img/<?php echo $publicacion->archivo ?>" class="d-block w-100 p-5" style="max-height:560px;" width="20" alt="...">

                  <?php $contador = 1 ?>
                </div>
              <?php else : ?>
                <div class="carousel-item" data-bs-interval="7000">
                  <div class="pt-1">
                    <h2 class="text-center"><?php echo $publicacion->tituloPublic ?></h2>
                    <p class="text-center"><?php echo $publicacion->mensajePublic ?></p>
                  </Div>
                  <img src="<?php echo RUTA_URL ?>/img/<?php echo $publicacion->archivo ?>" class="d-block w-100 p-5" style="max-height:560px;" width="20" alt="...">

                </div>
              <?php endif ?>
            <?php endforeach ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

      <?php endif ?>
      </div>
    </div>
</body>

</html>





<script>
  var menuTimeout;

  document.addEventListener("mousemove", function() {
    var menu = document.getElementById("menu-container");
    menu.classList.add("show-menu");
    clearTimeout(menuTimeout);
    menuTimeout = setTimeout(function() {
      menu.classList.remove("show-menu");
    }, 2000);
  });

  //var myTimeout = setTimeout(ocultarMenu, 5000);
  // function mostrarMenu(){
  //   if(myTimeout){
  //     clearTimeout(myTimeout);
  //   }
  //   menu = document.getElementById("navbarToggleExternalContent");
  //   menu.classList.remove("collapse")
  //   var myTimeout = setTimeout(ocultarMenu, 5000);

  // }
  // function ocultarMenu(){
  //   menu = document.getElementById("navbarToggleExternalContent");
  //   menu.classList.add("collapse")

  // }
  function mueveReloj() {
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String(segundo)
    if (str_segundo.length == 1)
      segundo = "0" + segundo

    str_minuto = new String(minuto)
    if (str_minuto.length == 1)
      minuto = "0" + minuto

    str_hora = new String(hora)
    if (str_hora.length == 1)
      hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()", 1000)
  }
</script>