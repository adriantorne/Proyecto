<?php require_once RUTA_APP.'/vistas/inc/header.php';?>



    <div class="container mt-2">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Publicaciones</li>
    </ol>
  </nav>
        <h3 class="text-center">Publicaciones <i class="bi bi-book"></i></h3>
        <table class="table table-hover shadow" >
        <thead>
            <tr class="text-light bg-primary">
        
                <th scope="col">Titulo</th>
                <th scope="col">Mensaje</th>
                <th scope="col" >Fecha Inicio</th>
                <th scope="col" >Fecha Fin</th>
                
                <th scope="col">Usuario</th>
                <th scope="col">Estado</th>
                <th></th>
              
                
            </tr>
        </thead>
        <tbody  id="usuarios">
        </table>

       
        <!-- <!-- <table class="table table-hover shadow">
        <thead>
            <tr class="text-light bg-primary">
        
                <th scope="col">Titulo</th>
                <th scope="col">Mensaje</th>
                <th scope="col" >Fecha Inicio</th>
                <th scope="col" >Fecha Fin</th>
                
                <th scope="col">Usuario</th>
                <th scope="col">Estado</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody id="tbody">
                <?php foreach ($datos['publicaciones']as $publicacion): ?>
                    <tr class="bg-light">
                    <?php
                    // $estadoBoton1="";
                    // $estadoBoton2="";
                    // if($beca->primerPago>0){
                    //     $estadoBoton1="disabled";
                    // }
                    // if($beca->segundoPago>0||$beca->primerPago==NULL){
                    //     $estadoBoton2="disabled";
                    // }
                    ?>
                    <td><?php echo $publicacion->tituloPublic ?></td>
                    <td><?php echo $publicacion->mensajePublic ?>€</td>
                    <td ><?php echo $publicacion->fechaInicio ?></td>
                    <td ><?php echo $publicacion->fechaLimite ?></td>
                    <td><?php echo $publicacion->nombreUser ?></td>
                  
                    <?php if($publicacion->validada=="-1"):?>
                        <td class="text-danger bold"> <strong><?php echo "DENEGADA"?></strong></td>
                    <?php elseif($publicacion->validada=="1"):?>
                        <td class="text-success bold"> <strong><?php echo "APOBADA"?></strong></td>
                    <?php endif?>
                    
                     
                
                        <td class="">
                    <a class="w-sm-100 btn btn-outline-success btn-lg" href=""><i class="bi bi-pencil-square"></i></a>

                
                    
                    
                    <button type="button" onclick="validar_borrar()" 
                    data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" class="w-sm-100  btn btn-outline-danger btn-lg"><i class="bi-trash"></i>
                    </button>
                   
                    
                
                    </td>
                    </td>
                    </tr>

             

                <?php endforeach?>
    </tbody>
        </table> -->



       



        <nav aria-label=" Page navigation example ">
  <ul class="pagination d-flex justify-content-center">
    <li class="shadow page-item">
      <a class="page-link" href="#" aria-label="Previous" onclick="prevPage()">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><span class="page-link" id="numerito" ></span></li>
    <li class="shadow page-item">
      <a class="page-link" onclick="nextPage()" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
    </nav> 
    <div id="normal">

    <span id="page"></span>
    
    </div>

    


</body>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
</html>

<script>

    
            const datosTabla=<?php echo json_encode($datos['publicaciones'])?>;
            let aprobada="";
           
            const ordenT=datosTabla.sort((a,b) => a.NombreRol > b.NombreRol);
            
            //console.log(ordenT);
            document.getElementById("page").style="display:none";
            var current_page = 1;
            var obj_per_page = 4;

            function totNumPages(){
                
                return Math.ceil(datosTabla.length / obj_per_page);     
            }

            function prevPage(){
                
                if (current_page > 1) {
                    current_page--;
                    change(current_page);
                }
            }

            function nextPage(){
                if (current_page < totNumPages()) {
                    current_page++;
                    change(current_page);
                }
            }

            function change(page){

                //console.log(page);
                var btn_next = document.getElementById("btn_next");
                var btn_prev = document.getElementById("btn_prev");
                var listing_table = document.getElementById("usuarios");
                var page_span = document.getElementById("page");

                if (page < 1) {
                    page = 1;
                }

                if (page > totNumPages()) {
                    page = totNumPages();
                }
                document.getElementById("numerito").innerHTML=page
                listing_table.innerHTML = "";

                if (page * obj_per_page>datosTabla.length) {
                    for (var i = (page-1) * obj_per_page; i < datosTabla.length; i++) {
                    
                        listing_table.innerHTML += '<tbody><tr><td>'+ datosTabla[i].tituloPublic +'</td><td>'+ datosTabla[i].mensajePublic +'</td><td>'+ datosTabla[i].fechaInicio +'</td><td>'+ datosTabla[i].fechaLimite +'</td><td>'+ datosTabla[i].nombreUser +'</td><td>'+ datosTabla[i].validada +'</td></tr></tbody></table>' ;
                        
                    }
                }else{
                    for (var i = (page-1) * obj_per_page; i < (page * obj_per_page); i++) {
                        listing_table.innerHTML += '<tbody><tr><td>'+ datosTabla[i].tituloPublic +'</td><td>'+ datosTabla[i].mensajePublic +'</td><td>'+ datosTabla[i].fechaInicio +'</td><td>'+ datosTabla[i].fechaLimite +'</td><td>'+ datosTabla[i].nombreUser +'</td><td>'+ datosTabla[i].validada +'</td><td><a class="btn btn-outline-success btn-sm" href="<?php echo RUTA_URL?>/usuario/ver_usuario/' + datosTabla[i].idPersona 
                        + '"><i class="bi bi-pencil-square"></i></td></tr></tbody></table>' ;
                        
                    }  
                }
                
                page_span.innerHTML = page;

                if (page == 1) {
                    btn_prev.style.visibility = "hidden";
                } else {
                    btn_prev.style.visibility = "visible";
                }
                if (page == totNumPages()) {
                    btn_next.style.visibility = "hidden";
                } else {
                    btn_next.style.visibility = "visible";
                }
            }

            window.onload = function() {
                change(1);
            };
  
        
    
               
</script>