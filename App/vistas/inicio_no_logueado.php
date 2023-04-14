
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="<?php echo RUTA_URL?>../css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Proyecto</title>
</head>
<body onmousemove="mostrar()">
<div class="collapse " id="navbarToggleExternalContent">
  <div class="bg-white p-4 d-flex justify-content-center">
 
</nav>
<a href="<?php echo RUTA_URL?>/login" class="btn btn-primary w-25" ><strong>ACCEDER</strong></a>
  </div>
</div>
<nav class="navbar navbar-dark bg-white">
  <div class="container-fluid">
    <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon bg-dark"></span>
    </button>
  </div>
</nav>

<div class="container">
  <?php
    echo "<p>No se encuentran publicaciones disponibles por el momento.</p>";
    echo "<div id='clock' class='d-flex justify-content-center'>".date(" H : i A")."</div>";
?>

</div>

 
</body>
</html>
<script>



</script>
