<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>INICIO SESION</h1>
      </div>
  </div> 

  <?php if(isset($datos["error"]) && $datos["error"]=='error_1'): ?>
    <div class="alert alert-danger mt-3 justify-content-center" role="alert">
    Usuario o Contraseña incorrecto!!
    </div>
  <?php endif?>
  <form method="post">
    <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="mb-3 col-5">
        <input type="text" class="form-control bg-light"  name="usuario" placeholder="Usuario" required>   
      </div>
    </div>
    <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="mb-3 col-5">
        <input type="password" class="form-control bg-light"  name="pass" placeholder="Contraseña" required>
      </div>
    </div>

      <div class="col-12 text-center">
        <button type="submit" class=" w-25 btn btn-light btn-lg border border-dark ">ENTRAR</button>
      </div>

      <div  class="mt-3 col-12 text-center">
        <a href="<?php echo RUTA_URL?>/login/recuperarPass">¿Has olvidado tu contraseña?</a>
      </div>
      
  </form>
</div>
    
</body>
</html>
    