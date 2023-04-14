<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
   <?php

        $validada="";
        if($datos['publicacion']->validada==1){
            $validada="(Aprobada)";
        }else{
            $validada="(Denegada)";
        }
    ?>
    <div class="container  mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
                <li id="lipan" class="breadcrumb-item"><a href="<?php echo RUTA_URL?>/publicacion/index">Publicaciones</a></li>
                <li id="lipan" class="breadcrumb-item active" aria-current="page">Ver publicacion</li>
            </ol>
        </nav>
        
        <h2 class="text-center"><strong><?php echo $datos['publicacion']->tituloPublic?></strong><p class="text-secondary" style="font-size:50%; "><?php echo $validada?></p></h2>
        <div class="container">
        <form>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mensaje</label>
               
                    <textarea style="height:100px;" class="form-control" placeholder="" id="floatingTextarea" disabled><?php echo $datos['publicacion']->mensajePublic?></textarea>

            </div>
            <?php if($datos['publicacion']->archivo==""):?>
            <div id="aquiimagen" class="d-flex justify-content-center align-items-center form-control">
               <p>Esta publicacion no tiene imagen</p>
            </div>
            <?php else:?>
            <div class="mb-3 d-flex justify-content-center aligns-items-center">
                <img width="400" src="<?php echo RUTA_URL?>../imagenes/<?php echo $datos['publicacion']->archivo?>">
            </div>
            <?php endif?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Creadada por:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['publicacion']->nombreUser?>" disabled>
                
            </div>
            <?php if($datos['publicacion']->validada=="-1"):?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Motivo Denegación:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['publicacion']->motivoDenegacion?>" disabled>
          
            </div>
            <?php endif?>
            <div class="mb-3">
				<label class="control-label">Fecha Inicio:</label>
					<div class="input-group input-group-sm date date-picker" data-date-container="#form_insertar_cliente_potencial">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['publicacion']->fechaInicio?>" disabled>
                               
				    </div>
			</div>
            <div class="mb-3">
				<label class="control-label">Fecha Fin:</label>
					<div class="input-group input-group-sm date date-picker" data-date-container="#form_insertar_cliente_potencial">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos['publicacion']->fechaLimite?>" disabled>
                    
                                </span>
				    </div>
			</div>
            <p>Fecha de creacion: <?php echo $datos['publicacion']->fechaCreacion?></p>
        </form>
    </div>
    </div>
