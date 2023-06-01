<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
            <li id="lipan" class="breadcrumb-item active" aria-current="page">Publicaciones activas</li>
        </ol>
    </nav>
    <?php if ($datos['activas'] != []) : ?>
        <h2 class="text-center"><strong>Publicaciones Activas <i class="bi bi-journal-check"></i></strong> </h2>

        <div class="col-4 mb-2">
            <form class="form-inline">

                <div class="input-wrapper">
                    <input id="q" class="btn btn border border-secondary" type="search" placeholder="Buscar" onkeyup="search()">

                    <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </form>
        </div>


        <table class="table table-hover shadow">
            <thead>
                <tr style="background-color:#043b83;" class="text-light">

                    <th scope="col">Titulo</th>
                    <th scope="col">Pantallas disponible</th>
                    <th scope="col">Tiempo restante</th>
                    <th></th>


                </tr>
            </thead>
            <tbody id="usuarios">
                <?php foreach ($datos['activas'] as $activas) : ?>
                    <tr>
                        <td><?php echo $activas->tituloPublic ?></td>
                        <td>
                            <?php foreach ($datos['pantallas'] as $pantallas) : ?>
                                <?php if ($pantallas->idPublic == $activas->idPublic) : ?>
                                    <?php echo "<i class='bi bi-display'></i> " . $pantallas->nombrePantalla ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </td>
                        <td>
                            <?php
                            $fechaActual = new DateTime(); // Obtiene la fecha actual

                            // Supongamos que obtienes la fecha final desde una base de datos en formato Y-m-d
                            $fechaFinStr =  $activas->fechaLimite;

                            $fechaFin = DateTime::createFromFormat('Y-m-d', $fechaFinStr)->setTime(0, 0, 0);

                            $intervalo = $fechaActual->diff($fechaFin); // Calcula la diferencia entre la fecha actual y la fecha final

                            $tiempoRestante = $intervalo->format('%a días, %h horas'); // Formatea la diferencia en días y horas

                            echo  $tiempoRestante;
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ver<?php echo $activas->idPublic ?>"><i class="bi bi-eye"></i></button>
                            <a class="btn btn-outline-danger" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/publicacion/desactivar_publicacion/<?php echo $activas->idPublic ?>"><i class="bi bi-x-circle"></i></i></a>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <h2>NO HAY PUBLICACIONES ACTIVAS</h2>
    <?php endif ?>
</div>


<!-- MODALES -->
<?php foreach ($datos["activas"] as $activas) : ?>


    <div class="modal fade" id="ver<?php echo $activas->idPublic ?>">

        <div class="modal-dialog modal-dialog-centered modal-xl">

            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title ms-3"><?php echo $activas->tituloPublic ?></h4>
                    <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
                </div>



                <!-- Modal Body -->
                <div class="modal-body ms-3">
                    <p><?php echo $activas->mensajePublic ?></p><br>
                    <?php if ($activas->archivo != "") : ?>
                        <img src="<?php echo RUTA_URL ?>../img/<?php echo $activas->archivo ?>" width="160"><br>
                    <?php else : ?>

                        <div id="aquiimagen" class="d-flex justify-content-center align-items-center form-control">
                            <p>Esta publicacion no tiene imagen</p>
                        </div><br><br>
                    <?php endif ?>
                    <p class="mt-2">Fecha de creación: <?php echo $activas->fechaCreacion ?></p>
                    <p class="mt-2">Fecha Inicio: <?php echo $activas->fechaInicio ?></p>
                    <p class="mt-2">Fecha Fin: <?php echo $activas->fechaLimite ?></p>
                    <p class="mt-2">Creada por: <?php echo $activas->nombreUser ?></p>
                    <p class="mt-2"><?php foreach ($datos['pantallas'] as $pantallas) : ?>

                            <?php if ($pantallas->idPublic == $activas->idPublic) : ?>
                                <?php echo "<i class='bi bi-display'></i> " . $pantallas->nombrePantalla ?>
                            <?php endif ?>
                        <?php endforeach ?></p>
                </div>
                <div class="modal-footer">


                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

                </div>
                </form>



            </div>
        </div>
    </div>
<?php endforeach ?>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<script>
    function confirmar(e) {

        var res = confirm('¿Estas seguro de que quieres dejar de mostrar esta publicacion? Aún le queda tiempo restante de estar publicada');
        if (res == false) {
            e.preventDefault();
        }
    }

    function search() {
        var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
        num_cols = 10;
        input = document.getElementById("q");
        filter = input.value.toUpperCase();
        table_body = document.getElementById("usuarios");
        tr = table_body.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            display = "none";
            for (j = 0; j < num_cols; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        display = "";
                    }
                }
            }
            tr[i].style.display = display;
        }
    }
</script>