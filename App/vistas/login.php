<?php require_once RUTA_APP.'/vistas/inc/header_no_logeado.php'?>
<div class="container">
    
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12">
      <h1>INICIO SESIÓN</h1>
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
        <input type="text" class="form-control bg-white"  name="usuario" placeholder="Usuario" required>   
      </div>
    </div>
    <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="mb-3 col-5">
      
        <input type="password" class="form-control bg-white" id="password"  name="pass" placeholder="Contraseña" required>
        <a class="btn btn-light mt-2 w-50" type="button" onclick="mostrarContrasena()"><i class="bi bi-eye"> Mostrar contraseña</i></a>
      </div>
    

    </div>

      <div class="col-12 text-center">
        <button type="submit" class=" w-25 btn btn-outline-dark btn-lg border border-dark ">ENTRAR</button>
      </div>

      <div  class="mt-3 col-12 text-center ">
        <a class="text-dark" href="<?php echo RUTA_URL?>/login/recuperarPass">¿Has olvidado tu contraseña?</a>
      </div>
      
  </form>
</div>
    
</body>
</html>
    <script>
      function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
    </script>