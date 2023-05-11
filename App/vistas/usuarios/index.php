<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container mt-2 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL?>">Home</a></li>
        <li id="lipan" class="breadcrumb-item active" aria-current="page">Usuarios</li>
        </ol>
    </nav>

  
    <div class="row d-flex justify-content-center text-center mt-3">
        <div class="col-12 mb-2">
        <h2  class="text-center"><strong>Usuarios <i class="bi bi-people"></i></strong> </h2>
        </div>
    </div>
    <?php if(isset($datos["error"]) && $datos["error"]=='error_1'): ?>
    <div class="alert alert-danger mt-3 justify-content-center" role="alert">
    Clave actual incorrecta!!
    </div>
  <?php endif?>
    <a class="btn btn-primary mt-3"   data-bs-toggle="modal" data-bs-target="#addusuario" style="background-color:#043b83; border-color:#043b83;" >+ Añadir Usuario</a>
    <!-- <a class="btn btn-primary mt-3" style="background-color:#043b83; border-color:#043b83;"   onclick="ordenarTipo()">Ordenar por Nombre</a> -->
    <button type="button"  data-bs-toggle="modal" data-bs-target="#verDeshabilitados"  style="background-color:#043b83; border-color:#043b83;" class="btn btn-primary position-relative mt-3">
        Usuarios deshabilitados
        
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?php foreach($datos['cantidad']as $cantidad):?>
        <?php echo $cantidad->cantidad?>
        <?php endforeach?>
        <span class="visually-hidden">unread messages</span>
    </span>
    </button>
   
    <form class="d-flex mt-3 mb-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar usuario" id="buscador" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" onclick="return buscarUsuario()" ><i class="bi bi-search"></i></button>
    </form>
    
    <ul class="list-group list-group-flush mt-4" id="usuarios">



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

        <!--MODAL AÑADIR USUARIO-->
<div class="modal fade modalForm " id="addusuario" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">AÑadir usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                    <div class="row">
                    <div class="mb-3 col-6">
                        <label for="nombre_us" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_us" name="nombre" required>   
                    </div>

                    <div class="mb-3 col-6">
                        <label for="apellido_us" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido_us" name="apellido" required>   
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="genero_us" class="form-label">Departamento <i class="bi bi-building-fill"></i></label>
                    
                        <select name="dpto" id="genero_us" class="form-select" required>
                        <?php foreach($datos['departamentos']as $departamento):?>
                            
                            <option value="<?php echo $departamento->idDpto?>"><?php echo $departamento->nombreDpto ?></option>
                        
                        <?php endforeach?>
                        </select>   
                    </div>

                    <div class="row">
                    <div class="mb-3 col-6">
                        <label for="email_us" class="form-label">Email <i class="bi bi-envelope"></i></label>
                        <input type="email" class="form-control" id="email_us" name="email"  required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="telefono" class="form-label">Telefono<i class="bi bi-phone"></i></label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="mb-3 col-6 ">
                        <label for="apellido_us" class="form-label">Nombre usuario <i class="bi bi-person-vcard"></i></label>
                        <input type="text" class="form-control" id="apellido_us" name="nombreUser" required>   
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="apellido_us" class="form-label">Clave <i class="bi bi-incognito"></i></label>
                        <input type="password" class="form-control" id="apellido_us" name="claveUser" required>   
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="genero_us" class="form-label">Rol <i class="bi bi-dpad"></i></label>
                    
                        <select name="rol" id="genero_us" class="form-select" required>
                        <?php foreach($datos['rol']as $rol):?>
                            
                            <option value="<?php echo $rol->idRol?>"><?php echo $rol->nombreRol ?></option>
                        
                        <?php endforeach?>
                        </select>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"  style="background-color:#144684; border-color:#144684;">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                    
<!--FIN MODAL AÑADIR USUARIO-->
</div>
<!--MODAL VER USUARIO-->
    <?php foreach ($datos["usuarios"] as $usuario): ?>
<div class="modal fade" id="ver<?php echo $usuario->idUser?>">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content" id="modalcontent">

        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ms-3">Usuario: <?php echo $usuario->nombreUser?></h4> 
                <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
            </div>

       

            <!-- Modal Body -->
            <div class="modal-body" id="modalBody">
            <form id="formPubli" method="post"  enctype="multipart/form-data">
                <div class="modal-body"> 

                    
                        
                
                    <div class="row">
                    <div class="mb-3 col-6">
                        <label for="nombre_us" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre_us" name="nombre" value="<?php echo $usuario->nombre?>" required>   
                    </div>

                    <div class="mb-3 col-6">
                        <label for="apellido_us" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido_us" name="apellido"  value="<?php echo $usuario->apellido?>" required>   
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="genero_us" class="form-label">Departamento <i class="bi bi-building-fill"></i></label>
                    
                        <select name="dpto" id="genero_us" class="form-select" required>
                        <option value="<?php echo $usuario->idDpto?>" selected><?php echo $usuario->nombreDpto ?></option>
                        <?php foreach($datos['departamentos']as $departamento):?>
                            
                            <option value="<?php echo $departamento->idDpto?>"><?php echo $departamento->nombreDpto ?></option>
                        
                        <?php endforeach?>
                        </select>   
                    </div>

                    <div class="row">
                    <div class="mb-3 col-6">
                        <label for="email_us" class="form-label">Email <i class="bi bi-envelope"></i></label>
                        <input type="email" class="form-control" id="email_us" name="email"   value="<?php echo $usuario->email?>" required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="telefono" class="form-label">Telefono <i class="bi bi-phone"></i></label>
                        <input type="text" class="form-control" id="telefono" name="telefono"   value="<?php echo $usuario->telefono?>" required>
                    </div>
                    </div>
                   
                    <div class="row">
                    <div class="mb-1 col-12 ">
                        <label for="apellido_us" class="form-label">Nombre usuario <i class="bi bi-person-vcard"></i></label>
                        <input type="text" class="form-control" id="apellido_us" name="nombreUser"  value="<?php echo $usuario->nombreUser?>"required>   
                    </div>
                   
                    
                       
                    
                       <div class="mb-1 col-12 ">
                       <a class="btn btn-primary mt-3" onclick="pasarIdModal(<?php echo $usuario->idUser?>)" data-bs-toggle="modal" data-bs-target="#cambiarClave"  style="background-color:#043b83; border-color:#043b83;"onclick="cambiarModal()">CAMBIAR CLAVE</a>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="genero_us" class="form-label">Rol <i class="bi bi-dpad"></i></label>
                    
                        <select name="rol" id="genero_us" class="form-select" required>
                        <option value="<?php echo $usuario->idRol?>" selected><?php echo $usuario->nombreRol ?></option>
                        <?php foreach($datos['rol']as $rol):?>
                            
                            <option value="<?php echo $rol->idRol?>"><?php echo $rol->nombreRol ?></option>
                        
                        <?php endforeach?>
                        </select>   
                </div>
            </div>
            <input type="hidden" name="idUser" value="<?php echo $usuario->idUser?>">
                        </div>
            <div class="modal-footer">
          
            <button type="button" class="btn btn-secondary btn" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary btn" style="background-color:#043b83; border-color:#043b83;" value="Guardar">
            </form>
            </div> 
      
                        </div>
        </div>

    </div>
</div>
<?php endforeach?>
<!--FIN MODAL AÑADIR USUARIO-->

<!--MODAL USUARIOS DESHABILITADOS-->
<div class="modal fade" id="verDeshabilitados">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ms-3">Usuarios deshabilitados</h4> 
                <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
            </div>

       

            <!-- Modal Body -->
            <div class="modal-body">
                <?php if($datos['deshabilitados']!=[]):?>
            <table class="table table-hover shadow" >
        <thead>
            <tr style="background-color:#043b83;" class="text-light">
        
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">NombreUser</th>
                <th scope="col">Rol</th>
                <th></th>
              
                
            </tr>
        </thead>
        <tbody  id="usuarios">
        <?php foreach($datos['deshabilitados']as $usuario) :?>
            <tr>
               
                    <td><?php echo $usuario->nombre ?></td>
                    <td><?php echo $usuario->apellido ?></td>
                    <td><?php echo $usuario->nombreUser ?></td>
                    
                    <td><?php echo $usuario->nombreRol ?></td>
           
            <td>
         
            <a class="w-sm-100  btn btn-outline-danger btn-lg" onclick="confirmar2(event)" href="<?php echo RUTA_URL?>/usuario/borrar_usuario/<?php echo $usuario->idUser ?>"><i class="bi-trash"></i></a>
           
            <a class="w-sm-100  btn btn-outline-success btn-lg" onclick="confirmar3(event)" href="<?php echo RUTA_URL?>/usuario/activar_usuario/<?php echo $usuario->idUser ?>"><i class="bi bi-person-fill-up"></i></a>
           
            </td>
            <?php endforeach?>
            </tr>
        </tbody>
        </table>
        <?php else:?>
            <h2>No hay usuarios deshabilitados</h2>
        <?php endif?>
            </div>
            <div class="modal-footer">
            

            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

            </div> 
      
      
        </div>

    </div>
</div>
<!--FIN MODAL DESHABILITADOS-->
<!--MODAL publicaciones por usuario-->
<?php foreach ($datos["usuarios"] as $usuario): ?>
<div class="modal fade" id="verPublic<?php echo $usuario->idUser?>">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title ms-3">Publicaciones de <?php echo $usuario->nombreUser?></h4> 
                <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
            </div>

       

            <!-- Modal Body -->
            <div class="modal-body">
            <table class="table table-hover shadow" >
        <thead>
            <tr style="background-color:#043b83;" class="text-light">
        
                <th scope="col">Titulo</th>
                <th scope="col">Mensaje</th>
                <th scope="col" >Fecha Creacion</th>
                
                
                
                <th scope="col">Estado</th>
                
              
                
            </tr>
        </thead>
        <tbody  id="usuarios">
        <?php foreach($datos['publicaciones']as $publiuser):?>
            <tr>
                
                <?php if($publiuser->idUser==$usuario->idUser):?>
                    <td><?php echo $publiuser->tituloPublic ?></td>
                    <td><?php echo $publiuser->mensajePublic ?></td>
                    <td><?php echo $publiuser->fechaCreacion ?></td>
                    <?php if($publiuser->validada==-1):?>
                        <td class="fw-bold text-danger">DENEGADA</td>
                    <?php elseif($publiuser->validada==1):?>
                        <td class="fw-bold text-success">APROBADA</td>
                    <?php endif?>
                <?php endif?>
                <?php endforeach?>
            </tr>
        </table>

            </div>
            <div class="modal-footer">
            

            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

            </div> 
      
      
        </div>

    </div>
</div>
  <!--mini modal cambiar clave-->
  <div class="modal fade modalForm text-white" id="cambiarClave" tabindex="-1" aria-labelledby="modalPublicación" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Clave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                
                <!-- CONTENIDO DEL MODAL PUBLICACIÓN -->
                <form id="formPubli" method="POST">
                <div class="modal-body text-white"> 
                    <div class="mb-3">
                    <label for="claveNow" class="form-label">Clave Actual</label>
                    <input type="password" class="form-control" name="claveActual" id="password2">
                    <a class="btn btn-secondary mt-2 w-50" type="button" onclick="mostrarContrasena2()"><i class="bi bi-eye"> Mostrar contraseña</i></a>
                    </div>   
                    <div class="mb-3">
                    <label for="claveNew" class="form-label">Nueva Clave</label>
                    <input type="password" class="form-control" name="claveNueva" id="password">
                    <a class="btn btn-secondary mt-2 w-50" type="button" onclick="mostrarContrasena()"><i class="bi bi-eye"> Mostrar contraseña</i></a>
                    </div>
                   
                       
                    

                    <input type="hidden" id="idUser" name="idUser" value="">
                

                </div>       
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"  style="background-color:#043b83; border-color:#043b83;" name="publiButton">Modificar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
                        

<!--FIN MINI MODAL CAMBIAR CLAVE-->
<?php endforeach?>

<!--FIN MODAL publicaciones usuario-->
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
<script>

    //paginacion, creado de tabla//

            const datosTabla=<?php echo json_encode($datos['usuarios'])?>;
            let aprobada="";
           
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
                    
                        let rol = "";
                        if(datosTabla[i].rol==3){
                            rol="Administrador"
                        }else{
                            rol="Publicador"
                        }
                       
                        listing_table.innerHTML += '<li class="shadow list-group-item mb-2"><img class="rounded" style="width:20px;" src="imagenes/456212.png"> ' + datosTabla[i].nombreUser+'-'+datosTabla[i].nombreRol
            +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver'+datosTabla[i].idUser+'"><i class="bi bi-eye"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/usuario/deshabilitar_usuario/' 
            + datosTabla[i].idUser + '"><i class="bi bi-person-dash"></i></i></a><a class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#verPublic'+datosTabla[i].idUser+'"><i class="bi bi-book"></i></div></li>' ;

                        let td = document.getElementsByClassName('valor');


                    }
                }else{
                    var validada="";
                    for (var i = (page-1) * obj_per_page; i < (page * obj_per_page); i++) {
                     
                           
                        listing_table.innerHTML += '<li class="shadow list-group-item mb-2"><img class="rounded" style="width:20px;" src="imagenes/456212.png"> ' + datosTabla[i].nombreUser+'-'+datosTabla[i].nombreRol
            +'<div class="mt-1 mb-1"><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver'+datosTabla[i].idUser+'"><i class="bi bi-eye"></i> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL?>/usuario/deshabilitar_usuario/' 
            + datosTabla[i].idUser + '"><i class="bi bi-person-dash"></i></i></a><a class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#verPublic'+datosTabla[i].idUser+'"><i class="bi bi-book"></i></div></li>' ;

                        let td = document.getElementsByClassName('valor');


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


            function buscarUsuario(){


document.getElementById("normal").style="display:none";
      var input = document.getElementById("buscador");

      var filter = input.value.toUpperCase();

     const datos=<?php echo json_encode($datos['usuarios']) ?>


     const datosFil=datos.filter(e=>e.nombreUser.toUpperCase()==filter);
      console.log(datosFil);


      document.getElementById("usuarios").innerHTML="";
      datosFil.forEach(e => {


          var ul = document.getElementById("usuarios");

          var li = document.createElement('li');
          li.className= "shadow list-group-item mb-2";
                                      
          var img = document.createElement('img');
          img.src="imagenes/456212.png"
          img.className="rounded";
          img.style="width:20px;";       

          var txt= document.createTextNode(" "+e.nombreUser+"-"+e.nombreRol);

          var div=document.createElement("div");
          div.className="mt-1 mb-1";

          var a=document.createElement("a");
          a.className="btn btn-outline-success btn-sm";
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target","#ver"+e.idUser+"");
          var i = document.createElement("i");
          i.className="bi-eye";

          var a1=document.createElement("a");
          a1.className="btn btn-outline-danger btn-sm";
          a1.onclick=function(){
          confirmar(event);
          }
          a1.setAttribute("href", "<?php echo RUTA_URL?>/ubicacion/borrar_ubicacion/"+e.nombreUser+"");
          var txt1= document.createTextNode(" ");
          var i1 = document.createElement("i");
          i1.className="bi-person-dash"

          var a2=document.createElement("a");
          a2.className="btn btn-outline-warning btn-sm";
          a2.setAttribute("data-bs-toggle", "modal");
          a2.setAttribute("data-bs-target","#verPublic"+e.idUser+"");
          var i2 = document.createElement("i");
          i2.className="bi-book";
          var txt2= document.createTextNode(" ");


          a2.appendChild(i2);
          a1.appendChild(i1);
          a.appendChild(i);
          div.appendChild(a);
          div.appendChild(txt1);
          div.appendChild(a1); 
          div.appendChild(txt2);
          div.appendChild(a2);      
          li.appendChild(img);
          li.appendChild(txt);
          li.appendChild(div);
          ul.appendChild(li);

          });

          return false;
      
  

}


//     function ordenarTipo(){
//         var datosTabla=<?php echo json_encode($datos['usuarios'])?>;

// const ordenT=datosTabla.sort((a,b) => a.nombre.toUpperCase() > b.nombre.toUpperCase());

// console.log(ordenT);
// document.getElementById("usuarios").innerHTML="";

// ordenT.forEach(e => {


    
//     var ul = document.getElementById("usuarios");

// var li = document.createElement('li');
// li.className= "shadow list-group-item mb-2";
                            
// var img = document.createElement('img');
// img.src="imagenes/456212.png"
// img.className="rounded";
// img.style="width:20px;";       

// var txt= document.createTextNode(" "+e.nombreUser+"-"+e.nombreRol);

// var div=document.createElement("div");
// div.className="mt-1 mb-1";

// var a=document.createElement("a");
// a.className="btn btn-outline-success btn-sm";
// a.setAttribute("data-bs-toggle", "modal");
// a.setAttribute("data-bs-target","#ver"+e.idUser+"");
// var i = document.createElement("i");
// i.className="bi-eye";

// var a1=document.createElement("a");
// a1.className="btn btn-outline-danger btn-sm";
// a1.onclick=function(){
// confirmar(event);
// }
// a1.setAttribute("href", "<?php echo RUTA_URL?>/ubicacion/borrar_ubicacion/"+e.nombreUser+"");
// var txt1= document.createTextNode(" ");
// var i1 = document.createElement("i");
// i1.className="bi-person-dash"

// var a2=document.createElement("a");
// a2.className="btn btn-outline-warning btn-sm";
// a2.setAttribute("data-bs-toggle", "modal");
// a2.setAttribute("data-bs-target","#verPublic"+e.idUser+"");
// var i2 = document.createElement("i");
// i2.className="bi-book";
// var txt2= document.createTextNode(" ");


// a2.appendChild(i2);
// a1.appendChild(i1);
// a.appendChild(i);
// div.appendChild(a);
// div.appendChild(txt1);
// div.appendChild(a1); 
// div.appendChild(txt2);
// div.appendChild(a2);      
// li.appendChild(img);
// li.appendChild(txt);
// li.appendChild(div);
// ul.appendChild(li);

    
// });


//     }


function confirmar(e){
        var res = confirm('¿Estas seguro de que quieres deshabilitar este usuario?');
        if(res == false){
            e.preventDefault();
        }  
}
function confirmar2(e){
        var res = confirm('¿Estas seguro de que quieres eliminar este usuario, se borraran todas su publicaciones!!!?');
        if(res == false){
            e.preventDefault();
        }  
    }

function confirmar3(e){
        var res = confirm('¿Estas seguro de que quieres habilitar este usuario?');
        if(res == false){
            e.preventDefault();
        }  
    }
    function pasarIdModal(idUser){
       document.getElementById("idUser").value=idUser;
 
    }
// function cambiarModal(){
//     let modal = document.getElementById("modalcontent");
//     modal.classList.add("bg-secondary");
// }
function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
  function mostrarContrasena2(){
      var tipo = document.getElementById("password2");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>