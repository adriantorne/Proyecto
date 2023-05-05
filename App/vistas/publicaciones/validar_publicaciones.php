<?php require_once RUTA_APP.'/vistas/inc/header.php';?>

<div class="container mt-2">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Validar publicaciones</li>
    </ol>
  </nav>
  <?php if($datos['pendientes']!=[]):?>  
        <h2  class="text-center"><strong>Validar publicaciones <i class="bi bi-patch-check"></i></strong> </h2>
       
                <div class="col-4 mb-2">
            <form class="form-inline">
            
            <div class="input-wrapper">
                <input id="q" class="btn btn border border-secondary" type="search"  placeholder="Buscar" onkeyup="search()">

                <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            </form>
        </div>

      
        <table class="table table-hover shadow" >
        <thead>
            <tr style="background-color:#043b83;" class="text-light">
        
                <th scope="col">Titulo</th>
                <th scope="col">Fecha creacion</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Fin</th>
                <th scope="col">Usuario</th>
                <th scope="col">Pantallas <i class="bi bi-display"></i></th>
                <th></th>
              
                
            </tr>
        </thead>
        <tbody  id="usuarios">
            <?php foreach($datos['pendientes']as $pendientes):?>
            <tr>
           
                <td  style="max-width:300px; overflow:hidden;"><?php echo $pendientes->tituloPublic?></td>
                
                <td><?php echo $pendientes->fechaCreacion?></td>
                <td><?php echo $pendientes->fechaInicio?></td>
                <td><?php echo $pendientes->fechaLimite?></td>
                <td><?php echo $pendientes->nombreUser?></td>
                <td>
                <?php foreach($datos['pantallas']as $pantallas):?>
                <?php if($pantallas->idPublic==$pendientes->idPublic):?>
                <?php echo "<i class='bi bi-display'></i> ".$pantallas->nombrePantalla?>
                <?php endif?>
                <?php endforeach?>
                </td>
                <td>
                    <button class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#ver<?php echo $pendientes->idPublic?>"><i class="bi bi-eye"></i></button>
                    <a class="btn btn-outline-success" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/publicacion/validar_publicacion/<?php echo $pendientes->idPublic?>"><i class="bi bi-check-circle-fill"></i></i></a>
                    <button class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#denegar<?php echo $pendientes->idPublic?>" ><i class="bi bi-x-circle-fill"></i></button>
                </td>
         
         
          
            <?php endforeach?>
            </tr>
        </tbody>
        </table>
<?php else:?>
    <h2>NO HAY PUBLICACIONES PENDIENTES DE VALIDACION</h2>
<?php endif?>
    </body>
</html>


   <!-- MODALES -->
<?php foreach ($datos["pendientes"] as $pendientes): ?>
   

<div class="modal fade" id="ver<?php echo $pendientes->idPublic?>">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ms-3"><?php echo $pendientes->tituloPublic?></h4> 
                <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
            </div>

        

          <!-- Modal Body -->
            <div class="modal-body ms-3">
                <p><?php echo $pendientes->mensajePublic?></p><br>
                <?php if($pendientes->archivo!=""):?>
                <img src="<?php echo RUTA_URL?>../img/<?php echo $pendientes->archivo?>" width="160"><br>
                <?php else:?>
            
                    <div id="aquiimagen" class="d-flex justify-content-center align-items-center form-control">
                    <p>Esta publicacion no tiene imagen</p>
                    </div><br><br>
                <?php endif?>
                <p class="mt-2">Fecha de creación: <?php echo $pendientes->fechaCreacion?></p>
                <p class="mt-2">Creada por: <?php echo $pendientes->nombreUser?></p>
                <p class="mt-2"><?php foreach($datos['pantallas']as $pantallas):?>
                <?php if($pantallas->idPublic==$pendientes->idPublic):?>
                <?php echo "<i class='bi bi-display'></i> ".$pantallas->nombrePantalla?>
                <?php endif?>
                <?php endforeach?></p>
            </div>
            <div class="modal-footer">
                

                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

            </div> 
            </form>
      
        

        </div>
    </div>
</div>

<div class="modal fade modalForm" id="denegar<?php echo $pendientes->idPublic?>" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Denegar publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                   
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                      
                    </div>
                    
                    <div class="grupo mb-4" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Motivo: </label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="motivo" name="motivoDen" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                       <input type="hidden" name="idPublic" value="<?php echo $pendientes->idPublic?>">
                    </div>

                   
                  

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="publiButton">Denegar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                </div>
       <?php endforeach?>



       <script>



      function confirmar(e){
        var res = confirm('¿Estas seguro de que quieres aprobar esta publicación?');
        if(res == false){
            e.preventDefault();
        } 
    } 
        function search(){
			var num_cols, display, input, filter, table_body, tr, td, i, txtValue;
			num_cols = 10;
			input = document.getElementById("q");
			filter = input.value.toUpperCase();
			table_body = document.getElementById("usuarios");
			tr = table_body.getElementsByTagName("tr");

			for(i=0; i< tr.length; i++){				
				display = "none";
				for(j=0; j < num_cols; j++){
					td = tr[i].getElementsByTagName("td")[j];
					if(td){
						txtValue = td.textContent || td.innerText;
						if(txtValue.toUpperCase().indexOf(filter) > -1){
							display = "";
						}
					}
				}
				tr[i].style.display = display;
			}
		}	
    
</script>