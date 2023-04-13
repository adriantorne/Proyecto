
    <?php include 'inc/header.php'?>
      
    <section class="container mt-3">
            <h2 class="text-center" style="color:#e8753f;"><strong>Submenu</strong> de Navegación</h2>

            <!-- ==================== ROL =================== -->
            
          
    
            <!-- ==================== FIN ROL =================== -->
            
            <!-- SUBMENU -->
            <div class="row">

         
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-person-circle" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Mi Perfil</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" data-bs-target="#publicacion" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div  style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-file-plus" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Añadir Publicación</h3>
                            </div>
                        </a>
                    </div>
                </div>
               
           
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-display" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Pantallas</h3>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-people" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Gestionar Usuarios</h3>
                            </div>
                        </a>
                    </div>
                </div>
              
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-patch-check" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Validar Publicaciones</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-journal-check" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Publicaciones activas</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="<?php echo RUTA_URL?>/publicacion" style="text-decoration:none; color:black;"> 
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-book" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Historico publicaciones</h3>
                            </div>
                        </a>
                    </div>
                </div>

             
                <div class="col-sm-12 col-md-6 col-lg-4 capa mb-3"> <!-- Alineación adaptable de Bootstrap -->
                    <div class="submenu"> 
                        <a href="#" data-bs-toggle="modal" class="linksmenu" style="text-decoration:none; color:black;" data-bs-target="#perfil"> <!-- Aqui se llama al Modal Perfil -->
                            <div style="background-color:#e4d3ca;" class="icono_submenu text-center">
                                <i class="bi bi-journal-check" style="font-size:400%;"></i>
                            </div>
                            <div class="texto_submenu text-center">
                                <h3>Ubicaciones</h3>
                            </div>
                        </a>
                    </div>
                </div>

        </section>


        <div class="modal fade modalForm" id="publicacion" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REALIZAR PUBLICACIÓN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" action="" enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                    <p class="m-0 mb-2">Seleccione las pantallas que mostraran su mensaje</p>
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                      
                    </div>
                    <button type="button" id="botonMarcar" class="btn btn-primary btn-sm mt-2" onclick="marcarTodos()">Marcar todos</button><br>
                    
                    <div class="grupo" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Asunto</label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="asunto" name="asunto" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                       
                    </div>

                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea id=mensaje name="mensaje" class="form-control"cols="3" rows="3" maxlength="2300"></textarea>

                    <div class="row mt-2">
                        <p class="m-0 mb-2">Establece el rango de fechas en que tu mensaje sera público</p>
                        <div id="grupo__fechaInicio" class="col">
                            <label for="fechaInicio" class="form-label m-0">Fecha inicio</label>
                            <div class="grupo-input" id="input_fechaInicio">
                                <input id="dateA" type="date" onchange="selectDate();" class="form-control" name="fechaInicio" min="">
                                <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                        </div>
                           
                        </div>

                        <div id="grupo__fechaFin" class="col">
                            <label for="fechaFin" class="form-label m-0">Fecha fin</label>
                            <div class="grupo-input" id="input__fechaFin">
                                <input id="dateB" type="date" onchange="selectDate();" class="form-control" name="fechaFin" min="" >
                                <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                        </div>
                            
                    </div>
                </div>

                    <div id="campo__publiImg" class="mt-2">
                        <div class="grupo-input" id="grupo__publiImg">
                            <input class="form-control" type="file" id="publiImg" accept="image/*,.pdf" name="publiImg">
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                     
                    </div>

                    
                </div>

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="publiButton">Publicar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ==================== FIN MODAL PUBLICACIÓN ==================== -->
    <?php include 'inc/footer.php'?>