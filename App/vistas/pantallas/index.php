<?php require_once RUTA_APP.'/vistas/inc/header.php';?>

<div class="container mt-2">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Pantallas</li>
    </ol>
  </nav>
        <h2  class="text-center"><strong>Pantallas <i class="bi bi-display"></i></strong> </h2>
        <div class="row mb-3">
        <div class="col-6 col-sm-5 col-md-4 col-lg-3 col-xl-2">
         <a class="btn btn-primary w-100" style="background-color:#043b83; border-color:#043b83; width:10%;" data-bs-toggle="modal" data-bs-target="#pantallas">+ Añadir Pantalla</a>
         </div>
        <div class="col-4">
            
             <form class="form-inline">
    
                <div class="input-wrapper">
                    <input id="q" class="btn btn border border-secondary" type="search"  placeholder="Buscar" onkeyup="search()">

                    <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </form>
    
         </div>
       
</div>

  <table class="table table-hover shadow" >
        <thead>
            <tr style="background-color:#043b83;" class="text-light">
        
                <th scope="col">Nombre</th>
                <th scope="col">MAC</th>
                <th scope="col"><a style="color:white;" href="<?php echo RUTA_URL?>/ubicacion">Ubicación</a></th>
                <th scope="col">Acciones</th>
              
                
            </tr>
        </thead>
        <tbody  id="usuarios">
        <?php foreach($datos['pantallas']as $pantalla) :?>
            <tr>
               
                    <td><?php echo $pantalla->nombrePantalla ?></td>
                    <td><?php echo $pantalla->MAC ?></td>
                    <td><?php echo $pantalla->nombreUbc ?></td>
                
           
            <td class="w-25">
            <a data-bs-toggle="modal" data-bs-target="#ver<?php echo $pantalla->idPantalla; ?>" class="w-sm-100 btn btn-outline-success btn-lg"><i class="bi bi-pencil-square"></i></a>
            <a class="w-sm-100  btn btn-outline-danger btn-lg" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/pantalla/borrar_pantalla/<?php echo $pantalla->idPantalla ?>"><i class="bi-trash"></i></a>
           
            </td>
            <?php endforeach?>
            </tr>
        </tbody>
        </table>
        <?php foreach($datos['pantallas']as $pantalla) :?>
            <div class="modal fade modalForm" id="ver<?php echo $pantalla->idPantalla?>" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar pantalla <i class="bi bi-pencil"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post">
                <div class="modal-body"> 

                    
                        
                
                   
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                      
                    </div>
                    
                    <div class="grupo" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Nombre pantalla</label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="asunto" name="nombrePan" value="<?php echo $pantalla->nombrePantalla?>" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                       
                    </div>

                    <label for="mensaje" class="form-label">Mac</label>
                    <input type="text" class="form-control" id="asunto" name="mac" value="<?php echo $pantalla->MAC?>"  onkeyup="validarMac(this)" required>
                   
                   
                    <div class="grupo mb-3" id="grupo__asunto">
                    <select name="ubicacion" id="tipomov" class="form-select mt-3 mb-3">
                   
                   <option value="<?php echo $pantalla->idUbc ?>" selected ><?php echo $pantalla->nombreUbc ?></option>
                   <?php foreach($datos['ubicaciones']as $ubicacion) :?>
                   <option value="<?php echo $ubicacion->idUbc ?>"><?php echo $ubicacion->nombreUbc?></option>
                   <?php endforeach?>
                   
               </select>
                       
                    </div>

                    <input type="hidden" name="idPantalla" value="<?php echo $pantalla->idPantalla?>">
                

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"  style="background-color:#043b83; border-color:#043b83;" name="publiButton">Modificar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach?>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<div class="modal fade modalForm" id="pantallas" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AÑADIR PANTALLA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                   
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                      
                    </div>
                    
                    <div class="grupo" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Nombre pantalla</label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="asunto" name="nombrePan" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                       
                    </div>

                    <label for="mensaje" class="form-label">Mac</label>
                    <input type="text" class="form-control" id="mac" name="mac"  onkeyup="validarMac(this)" required>
                    <select name="ubicacion" id="tipomov" class="form-select mt-3 mb-3">
                   
                            <option value="" selected disabled >Seleccione la ubicación</option>
                            <?php foreach($datos['ubicaciones']as $ubicacion) :?>
                            <option value="<?php echo $ubicacion->idUbc ?>"><?php echo $ubicacion->nombreUbc?></option>
                            <?php endforeach?>
                            
                        </select>
                   
                   

                    
                

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"  style="background-color:#043b83; border-color:#043b83;"  name="publiButton">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                           
<script>
      function confirmar(e){
        var res = confirm('¿Estas seguro de que quieres borrar esta pantalla?');
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
    function validarMac(mac){
        var regexp = /^(([A-Fa-f0-9]{2}[:]){5}[A-Fa-f0-9]{2}[,]?)+$/i;
        var mac_address = mac.value;
        console.log(mac_address);
        if(regexp.test(mac_address)) {
            mac.style = "border: 2px solid green";
            return true;
        } else {
           
            mac.style = "border: 2px solid red;";
            return false;
        }
            }
</script>

