<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<div class="container mt-2 ">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Ubicaciones</li>
    </ol>
  </nav>

  
  <div class="row d-flex justify-content-center text-center mx-0 mt-3">
      <div class="col-12 mb-2">
      <h2  class="text-center"><strong>Ubicaciones <i class="bi bi-geo-alt"></i></strong> </h2>
      </div>
  </div>
  <div class="row">
  <a class="btn btn-primary col-2 mt-3"   data-bs-toggle="modal" data-bs-target="#ubicacion">+ Añadir Ubicacion</a>
  
  <form class="d-flex mt-3 col-10" role="search">
      <input class="form-control me-2" type="search" placeholder="Buscar ubicacion" id="buscador" aria-label="Search">
      <button class="btn btn-outline-success" type="submit" onclick="return buscarUbi()" ><i class="bi bi-search"></i></button>
  </form>
</div> 

          <ul class="list-group list-group-flush mt-4" id="usuarios">

          <!-- <?php foreach ($datos['ubicaciones'] as $ubicacion) {?>
            
              <li class="list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/ubicacion.png"> <?php echo $ubicacion->nombreUbc?>
                  <div class="mt-1 mb-1">
                    
                      <a class="btn btn-outline-success btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#ver<?php echo $ubicacion->idUbc; ?>">
                            <i class="bi-display"></i>
                          </a>
                          <a class="btn btn-outline-danger btn-sm mt-1"  onclick="confirmar(event)" href="<?php echo RUTA_URL?>/ubicacion/eliminar_ubicacion/<?php echo $ubicacion->idUbc?>" >
                            <i class="bi-trash" ></i>
                          </a>
                  </div>
              </li>
              <?php } ?> -->

          </ul>
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


          </div>
 
   <!-- Modal -->
   <?php foreach ($datos["ubicaciones"] as $ubicacion): ?>
   <div class="modal fade" id="ver<?php echo $ubicacion->idUbc?>">

<div class="modal-dialog modal-dialog-centered modal-xl">

    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title ms-3"><a href="<?php echo RUTA_URL?>/pantalla/index">Pantallas:</a> <?php echo $ubicacion->nombreUbc?></h4> 
            <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
        </div>

        <form method="post">

          <!-- Modal Body -->
          <div class="modal-body">

            <div class="row">
    
            <table class="table table-hover shadow" >
        <thead>
            <tr style="background-color:#7c7c74;" class="text-light">
        
                <th scope="col">Nombre</th>
                <th scope="col">MAC</th>
                
              
                
            </tr>
        </thead>
        <?php foreach($datos['pantallas']as $pantalla) :?>
              <?php if($pantalla->idUbc==$ubicacion->idUbc):?>
        <tbody  id="usuarios">
        
            <tr>
               
                    <td><?php echo $pantalla->nombrePantalla ?></td>
                    <td><?php echo $pantalla->MAC ?></td>
                   
                
           
           <?php endif?>
            <?php endforeach?>
            </tr>
        </tbody>
        </table>
             
            
              
              
            </div> 
          </div> 
          <div class="modal-footer">
            

            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

          </div> 
      </form>
      
        

    </div>
</div>

</div>
<?php endforeach?>
                    </div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<div class="modal fade modalForm" id="ubicacion" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AÑADIR UBICACIÓN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                   
                    <div class="row mt-2 mb-0"><!-- VERIFICAR EL LARGO DE ASUNTO Y MENSAJE EN LA BASE DE DATOS PARA EVITAR ERRORES -->
                      
                    </div>
                    
                    <div class="grupo mb-4" id="grupo__asunto">
                        <label for="asunto" name="asunto" class="form-label mt-2">Nombre ubicación</label>
                        <div class="grupo-input" id="input__asunto">
                    <input type="text" class="form-control" id="asunto" name="nombreUbc" required>
                            <i class="validacion-estado fas fa-times-circle"></i>
                        </div>
                       
                    </div>

                   
                  

                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="publiButton">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
             
<script>

const datosTabla=<?php echo json_encode($datos['ubicaciones'])?>;

const ordenT=datosTabla.sort((a,b) => a.NombreRol > b.NombreRol);

//console.log(ordenT);
document.getElementById("page").style="display:none";
var current_page = 1;
var obj_per_page = 3;

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
          listing_table.innerHTML += '<li class="shadow list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/ubicacion.png"> ' + datosTabla[i].nombreUbc
            +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver'+datosTabla[i].idUbc+'">'+" "+'<i class="bi bi-display"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/ubicacion/borrar_ubicacion/' 
            + datosTabla[i].idUbc + '"><i class="bi-trash" ></i></a></div></li>' ;

        }
    }else{
        for (var i = (page-1) * obj_per_page; i < (page * obj_per_page); i++) {

          listing_table.innerHTML += '<li class="shadow list-group-item mb-2"><img class="rounded" style="width:30px;" src="img/ubicacion.png"> ' + datosTabla[i].nombreUbc
            +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver'+datosTabla[i].idUbc+'">'+" "+'<i class="bi bi-display"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/ubicacion/borrar_ubicacion/' 
            + datosTabla[i].idUbc + '"><i class="bi-trash" ></i></a></div></li>' ;

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



function buscarUbi(){


  document.getElementById("normal").style="display:none";
        var input = document.getElementById("buscador");

        var filter = input.value.toUpperCase();

       const datos=<?php echo json_encode($datos['ubicaciones']) ?>


       const datosFil=datos.filter(e=>e.NombreRol.toUpperCase()==filter);
        console.log(datosFil);


        document.getElementById("usuarios").innerHTML="";
        datosFil.forEach(e => {


            var ul = document.getElementById("usuarios");

            var li = document.createElement('li');
            li.className= "list-group-item mb-2";
                                        
            var img = document.createElement('img');
            img.src="img/usuario.png";
            img.className="rounded";
            img.style="width:30px;";       

            var txt= document.createTextNode(" "+e.nombreUbc);

            var div=document.createElement("div");
            div.className="mt-1 mb-1";

            var a=document.createElement("a");
            a.className="btn btn-outline-success btn-sm";
            a.setAttribute("href", "<?php echo RUTA_URL?>/usuario/ver_usuario/"+e.idUbc+"");

            var i = document.createElement("i");
            i.className="bi-eye";

            var a1=document.createElement("a");
            a1.className="btn btn-outline-danger btn-sm";
            a1.onclick=function(){
            confirmar(event);
            }
            a1.setAttribute("href", "<?php echo RUTA_URL?>/usuario/borrar_usuario/"+e.idUbc+"");
            var txt1= document.createTextNode(" ");
            var i1 = document.createElement("i");
            i1.className="bi-trash";

            a1.appendChild(i1);

            a.appendChild(i);
            div.appendChild(a);
            div.appendChild(txt1);
            div.appendChild(a1);       
            li.appendChild(img);
            li.appendChild(txt);
            li.appendChild(div);
            ul.appendChild(li);

            });


        
    

}
      function confirmar(e){
        var res = confirm('¿Estas seguro de que quieres borrar esta ubicacion?*se borraran las pantallas asignadas a estas');
        if(res == false){
            e.preventDefault();
        } 
    } 
</script>