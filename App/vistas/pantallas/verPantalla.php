<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<body onload="mueveReloj()" class="">
<div class="container mt-2">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
            <li id="lipan" class="breadcrumb-item "><a href="<?php echo RUTA_URL ?>/pantalla">Pantallas</a></li>
            <li id="lipan" class="breadcrumb-item active " aria-current="page">Ver Pantalla</li>
        </ol>
    </nav>
</div>

 <h2 class="text-center">Pantalla <?php echo $datos['pantalla']->nombrePantalla?> <i class="bi bi-display"></i></h2>


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