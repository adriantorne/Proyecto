<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-2 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
            <li id="lipan" class="breadcrumb-item active" aria-current="page">Mi perfil</li>
        </ol>
    </nav>
    <h2 class="text-center"><strong>Mi perfil <i class="bi bi-person"></i></strong> </h2>
    <div class="shadow row bg-white">
        <form id="formPubli" method="post" enctype="multipart/form-data">

            <?php if (isset($datos["error"]) && $datos["error"] == 'error_1') : ?>
                <div class="alert alert-success mt-3 justify-content-center" role="alert">
                    Modificacion correcta
                </div>
            <?php endif ?>

            <a class="btn btn-primary mb-2 mt-3" onclick="pasarIdModal(<?php echo  $datos['usuarios']->idUser ?>)" data-bs-toggle="modal" data-bs-target="#cambiarClave" style="background-color:#043b83; border-color:#043b83;">CAMBIAR CLAVE</a>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="nombre_us" class="form-label">Nombre</label>
                    <input type="text" class="form-control " id="nombre_us" name="nombre" value="<?php echo  $datos['usuarios']->nombre ?>" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="apellido_us" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido_us" name="apellido" value="<?php echo  $datos['usuarios']->apellido ?>" required>
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="email_us" class="form-label">Email <i class="bi bi-envelope"></i></label>
                    <input type="email" class="form-control" id="email_us" name="email" value="<?php echo $datos['usuarios']->email ?>" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="telefono" class="form-label">Telefono<i class="bi bi-phone"></i></label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $datos['usuarios']->telefono ?>" required>
                </div>
            </div>


            <div class="mb-1 col-12 ">
                <label for="apellido_us" class="form-label">Nombre usuario <i class="bi bi-person-vcard"></i></label>
                <input type="text" class="form-control" id="apellido_us" name="nombreUser" value="<?php echo $datos['usuarios']->nombreUser ?>" required>
            </div>




            <input type="hidden" name="rol" value="<?php echo  $datos['usuarios']->rol ?>">
            <input type="hidden" name="idUser" value="<?php echo  $datos['usuarios']->idUser ?>">
            <input type="hidden" value="<?php echo  $datos['usuarios']->idDpto ?>" name="dpto">

            <div class="row mb-3 mt-2 d-flex justify-content-center">

                <input type="submit" class="btn btn-primary btn col-3" style="background-color:#043b83; border-color:#043b83;" value="Guardar">
            </div>
        </form>
    </div>

</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<!--mini modal cambiar clave-->
<div class="modal fade modalForm text-white" id="cambiarClave" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h5 class="modal-title text-dark">Cambiar Clave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
            <form id="formPubli" method="POST">
                <div class="modal-body text-dark">
                    <div class="mb-3">
                        <label for="claveNow" class="form-label">Clave Actual</label>
                        <input type="password" class="form-control" name="claveActual" id="password2">
                        <a class="btn btn-white text-dark mt-2 w-50" type="button" onclick="mostrarContrasena2()"><i class="bi bi-eye"> Mostrar contraseña</i></a>
                    </div>
                    <div class="mb-3">
                        <label for="claveNew" class="form-label">Nueva Clave</label>
                        <input type="password" class="form-control" name="claveNueva" id="password">
                        <a class="btn btn-white text-dark mt-2 w-50" type="button" onclick="mostrarContrasena()"><i class="bi bi-eye"> Mostrar contraseña</i></a>
                    </div>




                    <input type="hidden" id="idUser" name="idUser" value="">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background-color:#043b83; border-color:#043b83;" name="publiButton">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function pasarIdModal(idUser) {
        document.getElementById("idUser").value = idUser;

    }

    function mostrarContrasena() {
        var tipo = document.getElementById("password");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }

    function mostrarContrasena2() {
        var tipo = document.getElementById("password2");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>