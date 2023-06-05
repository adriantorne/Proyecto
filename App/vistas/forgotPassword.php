<?php require_once RUTA_APP . '/vistas/inc/header_no_logeado.php' ?>
<a href="<?php echo RUTA_URL ?>/login" class="btn btn-light mb-3"><i class="bi bi-chevron-double-left"></i>Volver</a>
<div class="container">
    <div class="row ">
        <div class="col-12 p-3 text-center">


        </div>

        <?php echo !empty($statusMsg) ? '<p class="' . $statusMsgType . '">' . $statusMsg . '</p>' : ''; ?>

        <div class="regisFrm row justify-content-center text-center my-5">

            <form method="post" class="form-control w-50 p-4" autocomplete="off">
                <div>
                    <h4>Introduce tu dirección de correo electrónico para cambiar tu contraseña</h4>
                    <p>Te enviaremos una contraseña temporal que deberás cambiar la próxima vez que accedas a la
                        aplicación.
                    </p>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control form-control-lg col-4" id="email" placeholder="" required>
                    <label for="email">Correo electrónico</label>
                </div>
                <button class="btn btn-dark col-12 my-2" onclick="recuperarPass()">Enviar</button>

            </form>
        </div>


    </div>
</div>

<script>
    async function recuperarPass() {
        const data = new FormData(document.getElementById('email'));
        //alert("dddddd")
        await fetch('<?php echo RUTA_URL ?>/login/recuperarPass', {
                method: "POST",
                body: data,
            })
            .then((resp) => resp.json())
            .then(function(data) {

                console.log(data)

                if (Boolean(data)) {
                    alert('Revisa tu correo')
                } else {
                    alert('Error al Cerrar la sesión')
                }

            })
    }
</script>