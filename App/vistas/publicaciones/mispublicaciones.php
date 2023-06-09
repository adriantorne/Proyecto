<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="container mt-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Mis publicaciones</li>
    </ol>
  </nav>
  <?php if ($datos['mispublicaciones'] != []) : ?>
    <h2 class="text-center"><strong>Mis publicaciones <i class="bi bi-newspaper"></i></strong> </h2>
    <div class="row col-12">
      <div class="mb-2 d-grid gap-2 d-md-flex justify-content-md-end col-8">


        <select name="tipomov" id="tipomov" class="form-select" onchange="filtrarPublicaciones()">
          <option value="" selected disabled>Seleccione un estado de publicacion...</option>
          <option value="1">Todos</option>
          <option value="2">Aceptadas</option>
          <option value="3">Denegadas</option>
          <option value="4">Pendientes</option>
        </select>
      </div>


      <div class="col-4">
        <form class="form-inline">

          <div class="input-wrapper">
            <input id="q" class="btn btn border border-secondary" type="search" placeholder="Buscar" onkeyup="search()">

            <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
        </form>
      </div>

    </div>
    <?php if (count($datos["mispublicaciones"]) > 5) : ?>
    <table class="table table-hover shadow">
      <thead>
        <tr style="background-color:#043b83;" class="text-light">

          <th scope="col">Titulo</th>
          <th scope="col">Fecha Creación</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Fin</th>
          <th scope="col">Estado</th>
          <th></th>


        </tr>
      </thead>
      <tbody id="usuarios">
        <tr>
    </table>









    <nav aria-label=" Page navigation example ">
      <ul class="pagination d-flex justify-content-center ">
        <li class="shadow page-item">
          <a class="page-link" href="#" aria-label="Previous" onclick="prevPage()">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><span class="page-link" id="numerito"></span></li>
        <li class="shadow page-item">
          <a class="page-link" onclick="nextPage()" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
    <div id="normal ">

      <span id="page"></span>

    </div>
    <?php else : ?>
      <table class="table table-hover shadow">
        <thead>
          <tr style="background-color:#043b83;" class="text-light">

            <th scope="col">Titulo</th>
            <th scope="col">Fecha Creación</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>

            
            <th scope="col">Estado</th>
            <th></th>


          </tr>
        </thead>
        <tbody id="usuarios2">
          <?php foreach ($datos["mispublicaciones"] as $publicacion) : ?>
            <tr data-validada="<?php echo $publicacion->validada; ?>">

              <td><?php echo $publicacion->tituloPublic ?></td>
              <td><?php echo $publicacion->fechaCreacion ?></td>
              <td><?php echo $publicacion->fechaInicio ?></td>
              <td><?php echo $publicacion->fechaLimite ?></td>
            
              <?php if ($publicacion->validada == "1") : ?>
                <td style="color:green;"><strong>APROBADA</strong></td>
              <?php elseif ($publicacion->validada == "-1") : ?>
                <td style="color:red;"><strong>DENEGADA</strong></td>
              <?php elseif($publicacion->validada == "0"): ?>
                <td style="color:grey;"><strong>PENDIENTE</strong></td>
              <?php endif?>
              <?php 
                  $estado="";
                if ($publicacion->validada == "1"||$publicacion->validada=="0"){
                $estado="style='visibility:hidden;'";
              } ?>
              <td>
                <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#ver<?php echo $publicacion->idPublic ?>"><i class="bi bi-eye"></i></a>
                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" title="rehacer publicacion" data-bs-target="#rehacer<?php echo $publicacion->idPublic?>" <?php echo $estado?>><i class="bi bi-arrow-clockwise" ></i></button> </td>

            </tr>
          <?php endforeach ?>
      </table>

    <?php endif ?>


  <?php else : ?>
    <h2>No tienes publicaciones todavía o estan pendientes de validación</h2>
  <?php endif ?>
  </body>

  </html>
  <?php foreach ($datos["mispublicaciones"] as $pendientes) : ?>


    <div class="modal fade" id="ver<?php echo $pendientes->idPublic ?>">

      <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content ">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title ms-3"><?php echo $pendientes->tituloPublic ?></h4>
            <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
          </div>



          <!-- Modal Body -->
          <div class="modal-body ms-3">

            <p><?php echo $pendientes->mensajePublic ?></p><br>
            <?php if ($pendientes->archivo != "") : ?>
              <img src="<?php echo RUTA_URL ?>../img/<?php echo $pendientes->archivo ?>" width="200"><br>
            <?php else : ?>

              <div id="aquiimagen" class="d-flex justify-content-center align-items-center form-control">
                <p>Esta publicacion no tiene imagen</p>
              </div><br><br>
            <?php endif ?>
            <p class="mt-2">Fecha de creación: <?php echo $pendientes->fechaCreacion ?></p>

            <p class="mt-2"><?php foreach ($datos['pantallas'] as $pantallas) : ?>
                <?php if ($pantallas->idPublic == $pendientes->idPublic) : ?>
                  <?php echo "<i class='bi bi-display'></i> " . $pantallas->nombrePantalla ?>
                <?php endif ?>

              <?php endforeach ?></p>
            <?php if ($pendientes->validada == -1) : ?>
              <p class="mt-2">Motivo de denegación: <?php echo $pendientes->motivoDenegacion ?></p>
            <?php endif ?>
          </div>
          <div class="modal-footer">


            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>

          </div>
          </form>


        </div>
      </div>
    </div>
  <?php endforeach ?>
  <?php foreach ($datos["mispublicaciones"] as $pendientes) : ?>


    <div class="modal fade" id="rehacer<?php echo $pendientes->idPublic ?>">

      <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title ms-3">Modificar publicación</h4>
            <button type="button" class="btn-close me-4" data-bs-dismiss="modal"></button>
          </div>



          <!-- Modal Body -->
          <div class="modal-body">
            <div class="alert alert-danger mt-2 justify-content-center" role="alert">
              Motivo de denegación: <strong><?php echo $pendientes->motivoDenegacion ?></strong>
            </div>
            <div class="grupo" id="grupo__asunto">
              <form method="POST" id="formPubli">
                <label for="asunto" name="asunto" class="form-label mt-2">Titulo</label>
                <div class="grupo-input" id="input__asunto">
                  <input type="text" class="form-control" id="asunto" name="titulo" required value="<?php echo $pendientes->tituloPublic ?>">
                  <i class="validacion-estado fas fa-times-circle"></i>
                </div>

            </div>

            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea id=mensaje name="mensaje" class="form-control" cols="3" rows="3" maxlength="2300"><?php echo $pendientes->mensajePublic ?></textarea>

            <div class="row mt-2">
              <p class="m-0 mb-2">Establece el rango de fechas en que tu mensaje sera público</p>
              <div id="grupo__fechaInicio" class="col">
                <label for="fechaInicio" class="form-label m-0">Fecha inicio</label>
                <div class="grupo-input" id="input_fechaInicio">
                  <input id="dateA" type="date" class="form-control" name="fechaInicio" id="fechaIni" min="" value="<?php echo $pendientes->fechaInicio ?>">
                  <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                </div>

              </div>

              <div id="grupo__fechaFin" class="col">
                <label for="fechaFin" class="form-label m-0">Fecha fin</label>
                <div class="grupo-input" id="input__fechaFin">
                  <input id="dateB" type="date" class="form-control" name="fechaFin" id="fechaFin" min="" value="<?php echo $pendientes->fechaLimite ?>">
                  <i class="validacion-estado fas fa-times-circle" style="right: 35px;"></i>
                </div>

              </div>
            </div>




            <input type="hidden" value="<?php echo $pendientes->idPublic ?>" name="idPublic">
          </div>

          <div class="modal-footer">


            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-secondary btn-lg" style="background-color:#043b83;">Volver a validar</button>
          </div>
          </form>



        </div>
      </div>
    </div>
</div>
<?php endforeach ?>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
<script>
  //paginacion, creado de tabla//

  const datosTabla = <?php echo json_encode($datos['mispublicaciones']) ?>;
  let aprobada = "";

  const ordenT = datosTabla.sort((a, b) => a.NombreRol > b.NombreRol);

  //console.log(ordenT);
  document.getElementById("page").style = "display:none";
  var current_page = 1;
  var obj_per_page = 5;

  function totNumPages() {

    return Math.ceil(datosTabla.length / obj_per_page);
  }

  function prevPage() {

    if (current_page > 1) {
      current_page--;
      change(current_page);
    }
  }

  function nextPage() {
    if (current_page < totNumPages()) {
      current_page++;
      change(current_page);
    }
  }

  function change(page) {

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
    document.getElementById("numerito").innerHTML = page
    listing_table.innerHTML = "";

    if (page * obj_per_page > datosTabla.length) {
      for (var i = (page - 1) * obj_per_page; i < datosTabla.length; i++) {

        if (datosTabla[i].validada == "1") {
          validada = "APROBADA"
          disabled = "style='visibility:hidden;'" + "disabled"

        } else if (datosTabla[i].validada == "-1") {
          validada = "DENEGADA"
          disabled = ""
        } else {
          validada = "PENDIENTE"
          disabled = "style='visibility:hidden;'" + "disabled"
        }
        listing_table.innerHTML += '<td>' + datosTabla[i].tituloPublic + '</td><td>' + datosTabla[i].fechaCreacion + '</td><td>' + datosTabla[i].fechaInicio + '</td><td>' + datosTabla[i].fechaLimite + '</td><td class="valor">' + validada + '</td><td><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver' + datosTabla[i].idPublic + '""' +
          '"><i class="bi bi-eye"></i></a> <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" title="rehacer publicacion" data-bs-target="#rehacer' + datosTabla[i].idPublic + '"' + disabled + '><i class="bi bi-arrow-clockwise" ></i></button></td></tr></tbody></table>';


        let td = document.getElementsByClassName('valor');

        for (let i = 0; i < td.length; i++) {

          //console.log(td[i].innerHTML);

          //console.log(td[i]);


          if (td[i].innerHTML == 'DENEGADA') {

            td[i].style.color = 'red';
            td[i].setAttribute('class', 'fw-bold')

          } else if (td[i].innerHTML == 'APROBADA') {
            td[i].style.color = 'green';
            td[i].setAttribute('class', 'fw-bold')
          } else {
            td[i].style.color = 'grey';
            td[i].setAttribute('class', 'fw-bold')
          }

        }
      }
    } else {
      var validada = "";
      let disabled = "";
      for (var i = (page - 1) * obj_per_page; i < (page * obj_per_page); i++) {
        if (datosTabla[i].validada == "1") {
          validada = "APROBADA"
          disabled = "style='visibility:hidden;'" + "disabled"

        } else if (datosTabla[i].validada == "-1") {
          validada = "DENEGADA"
          disabled = ""
        } else {
          validada = "PENDIENTE"
          disabled = "style='visibility:hidden;'" + "disabled"
        }
        listing_table.innerHTML += '<td>' + datosTabla[i].tituloPublic + '</td><td>' + datosTabla[i].fechaCreacion + '</td><td>' + datosTabla[i].fechaInicio + '</td><td>' + datosTabla[i].fechaLimite + '</td><td class="valor">' + validada + '</td><td><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver' + datosTabla[i].idPublic + '""' +
          '"><i class="bi bi-eye"></i></a> <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" title="rehacer publicacion" data-bs-target="#rehacer' + datosTabla[i].idPublic + '"' + disabled + '><i class="bi bi-arrow-clockwise" ></i></button></td></tr></tbody></table>';


        let td = document.getElementsByClassName('valor');

        for (let i = 0; i < td.length; i++) {

          //console.log(td[i].innerHTML);

          //console.log(td[i]);

          if (td[i].innerHTML == 'DENEGADA') {

            td[i].style.color = 'red';
            td[i].setAttribute('class', 'fw-bold')

          } else if (td[i].innerHTML == 'APROBADA') {
            td[i].style.color = 'green';
            td[i].setAttribute('class', 'fw-bold')
          } else {
            td[i].style.color = 'grey';
            td[i].setAttribute('class', 'fw-bold')
          }

        }

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
  //buscador onkeyup
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

  function confirmar(e) {
    var res = confirm('¿Estas seguro de que quieres borrar esta publicación?');
    if (res == false) {
      e.preventDefault();
    }
  }
  const movimiento = <?php echo json_encode($datos['mispublicaciones']) ?>;
  let t = document.getElementById("tipomov");
  t.addEventListener("change", function() {
    console.log(t.value);
    document.getElementById("usuarios").innerHTML = "";
    if (t.value == 1) {

      const tbody = document.getElementById("usuarios");



      //recorremos el array con todos los datos y llenamos la tabla
      movimiento.forEach((e) => {

        // tbody.appendChild(tr);

        tr = document.createElement("tr");

        td = document.createElement("td");
        tdText = document.createTextNode(e.tituloPublic);
        td.appendChild(tdText);
        tr.appendChild(td);

        td = document.createElement("td");
        tdText = document.createTextNode(e.fechaCreacion);
        td.appendChild(tdText);
        tr.appendChild(td);

        td = document.createElement("td");
        tdText = document.createTextNode(e.fechaInicio);
        td.appendChild(tdText);
        tr.appendChild(td);

        td = document.createElement("td");
        tdText = document.createTextNode(e.fechaLimite);
        td.appendChild(tdText);
        tr.appendChild(td);


        td = document.createElement("td");

        if (e.validada == 1) {
          tdText = document.createTextNode("APORBADA");
          td.appendChild(tdText);
          td.style.color = "green";
          td.setAttribute('class', 'fw-bold')
        } else if (e.validada == -1) {
          tdText = document.createTextNode("DENEGADA");
          td.appendChild(tdText);
          td.style.color = "red";
          td.setAttribute('class', 'fw-bold')
        } else {
          tdText = document.createTextNode("PENDIENTE");
          td.appendChild(tdText);
          td.style.color = "grey";
          td.setAttribute('class', 'fw-bold')
        };

        //   var i = document.createElement("i");
        //         i.className="bi-eye";

        //         var a1=document.createElement("a");
        //         a1.className="btn btn-outline-danger btn-sm";
        //         a1.onclick=function(){
        //         confirmar(event);
        //         }
        //         a1.setAttribute("href", "<?php echo RUTA_URL ?>/usuario/borrar_usuario/"+e.idPublic+"");
        //         var txt1= document.createTextNode(" ");
        //         var i1 = document.createElement("i");
        //         i1.className="bi-trash";

        //         a1.appendChild(td);

        tr.appendChild(td);

        td = document.createElement("td");
        a1 = document.createElement("a");

        a1.className = "btn btn-outline-danger btn-sm";
        a1.onclick = function() {
          confirmar(event);
        }
        a1.setAttribute("href", "<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/" + e.idPublic + "");
        var i1 = document.createElement("i");
        i1.className = "bi-trash";
        var a = document.createElement("a");
        a.className = "btn btn-outline-success btn-sm";
        a.setAttribute("data-bs-toggle", "modal");
        a.setAttribute("data-bs-target", "#ver" + e.idPublic + "");
        var i = document.createElement("i");
        i.className = "bi-eye";
        a.appendChild(i);
        td.appendChild(a);
        a1.appendChild(i1);
        td.appendChild(a1);
        tr.appendChild(td);
        tbody.appendChild(tr);


      });

      //document.getElementById("cuerpo").appendChild(tbody);
    }
    // document.getElementById("cuerpo").innerHTML="";
    if (t.value == 2) {

      const tbody = document.getElementById("usuarios");



      //recorremos el array con todos los datos y llenamos la tabla
      movimiento.forEach((e) => {

        // tbody.appendChild(tr);
        if (e.validada == 1) {
          tr = document.createElement("tr");

          td = document.createElement("td");
          tdText = document.createTextNode(e.tituloPublic);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaCreacion);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaInicio);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaLimite);
          td.appendChild(tdText);
          tr.appendChild(td);



          td = document.createElement("td");

          if (e.validada == 1) {
            tdText = document.createTextNode("APORBADA");
            td.appendChild(tdText);
            td.style.color = "green";
            td.setAttribute('class', 'fw-bold')
          } else if (e.validada == -1) {
            tdText = document.createTextNode("DENEGADA");
            td.appendChild(tdText);
            td.style.color = "red";
            td.setAttribute('class', 'fw-bold')
          } else {
            tdText = document.createTextNode("PENDIENTE");
            td.appendChild(tdText);
            td.style.color = "grey";
            td.setAttribute('class', 'fw-bold')
          };

          //   var i = document.createElement("i");
          //         i.className="bi-eye";

          //         var a1=document.createElement("a");
          //         a1.className="btn btn-outline-danger btn-sm";
          //         a1.onclick=function(){
          //         confirmar(event);
          //         }
          //         a1.setAttribute("href", "<?php echo RUTA_URL ?>/usuario/borrar_usuario/"+e.idPublic+"");
          //         var txt1= document.createTextNode(" ");
          //         var i1 = document.createElement("i");
          //         i1.className="bi-trash";

          //         a1.appendChild(td);

          tr.appendChild(td);

          td = document.createElement("td");
          a1 = document.createElement("a");

          a1.className = "btn btn-outline-danger btn-sm";
          a1.onclick = function() {
            confirmar(event);
          }
          a1.setAttribute("href", "<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/" + e.idPublic + "");
          var i1 = document.createElement("i");
          i1.className = "bi-trash";
          var a = document.createElement("a");
          a.className = "btn btn-outline-success btn-sm";
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target", "#ver" + e.idPublic + "");
          var i = document.createElement("i");
          i.className = "bi-eye";
          a.appendChild(i);
          td.appendChild(a);
          a1.appendChild(i1);
          td.appendChild(a1);
          tr.appendChild(td);
          tbody.appendChild(tr);

        }
      });
    }

    if (t.value == 3) {

      const tbody = document.getElementById("usuarios");



      //recorremos el array con todos los datos y llenamos la tabla
      movimiento.forEach((e) => {

        // tbody.appendChild(tr);
        if (e.validada == -1) {
          tr = document.createElement("tr");

          td = document.createElement("td");
          tdText = document.createTextNode(e.tituloPublic);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaCreacion);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaInicio);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaLimite);
          td.appendChild(tdText);
          tr.appendChild(td);



          td = document.createElement("td");

          if (e.validada == 1) {
            tdText = document.createTextNode("APORBADA");
            td.appendChild(tdText);
            td.style.color = "green";
            td.setAttribute('class', 'fw-bold')
          } else if (e.validada == -1) {
            tdText = document.createTextNode("DENEGADA");
            td.appendChild(tdText);
            td.style.color = "red";
            td.setAttribute('class', 'fw-bold')
          } else {
            tdText = document.createTextNode("PENDIENTE");
            td.appendChild(tdText);
            td.style.color = "grey";
            td.setAttribute('class', 'fw-bold')
          };

          //   var i = document.createElement("i");
          //         i.className="bi-eye";

          //         var a1=document.createElement("a");
          //         a1.className="btn btn-outline-danger btn-sm";
          //         a1.onclick=function(){
          //         confirmar(event);
          //         }
          //         a1.setAttribute("href", "<?php echo RUTA_URL ?>/usuario/borrar_usuario/"+e.idPublic+"");
          //         var txt1= document.createTextNode(" ");
          //         var i1 = document.createElement("i");
          //         i1.className="bi-trash";

          //         a1.appendChild(td);

          tr.appendChild(td);

          td = document.createElement("td");
          a1 = document.createElement("a");

          a1.className = "btn btn-outline-danger btn-sm";
          a1.onclick = function() {
            confirmar(event);
          }
          a1.setAttribute("href", "<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/" + e.idPublic + "");
          var i1 = document.createElement("i");
          i1.className = "bi-trash";
          var a = document.createElement("a");
          a.className = "btn btn-outline-success btn-sm";
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target", "#ver" + e.idPublic + "");
          var i = document.createElement("i");
          i.className = "bi-eye";
          a.appendChild(i);
          td.appendChild(a);
          a1.appendChild(i1);
          td.appendChild(a1);
          tr.appendChild(td);
          tbody.appendChild(tr);

        }
      });
    }
    if (t.value == 4) {

      const tbody = document.getElementById("usuarios");



      //recorremos el array con todos los datos y llenamos la tabla
      movimiento.forEach((e) => {

        // tbody.appendChild(tr);
        if (e.validada == 0) {
          tr = document.createElement("tr");

          td = document.createElement("td");
          tdText = document.createTextNode(e.tituloPublic);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaCreacion);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaInicio);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");
          tdText = document.createTextNode(e.fechaLimite);
          td.appendChild(tdText);
          tr.appendChild(td);



          td = document.createElement("td");

          if (e.validada == 1) {
            tdText = document.createTextNode("APORBADA");
            td.appendChild(tdText);
            td.style.color = "green";
            td.setAttribute('class', 'fw-bold')
          } else if (e.validada == -1) {
            tdText = document.createTextNode("DENEGADA");
            td.appendChild(tdText);
            td.style.color = "red";
            td.setAttribute('class', 'fw-bold')
          } else {
            tdText = document.createTextNode("PENDIENTE");
            td.appendChild(tdText);
            td.style.color = "grey";
            td.setAttribute('class', 'fw-bold')
          };

          //   var i = document.createElement("i");
          //         i.className="bi-eye";

          //         var a1=document.createElement("a");
          //         a1.className="btn btn-outline-danger btn-sm";
          //         a1.onclick=function(){
          //         confirmar(event);
          //         }
          //         a1.setAttribute("href", "<?php echo RUTA_URL ?>/usuario/borrar_usuario/"+e.idPublic+"");
          //         var txt1= document.createTextNode(" ");
          //         var i1 = document.createElement("i");
          //         i1.className="bi-trash";

          //         a1.appendChild(td);

          tr.appendChild(td);

          td = document.createElement("td");
          a1 = document.createElement("a");

          a1.className = "btn btn-outline-danger btn-sm";
          a1.onclick = function() {
            confirmar(event);
          }
          a1.setAttribute("href", "<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/" + e.idPublic + "");
          var i1 = document.createElement("i");
          i1.className = "bi-trash";
          var a = document.createElement("a");
          a.className = "btn btn-outline-success btn-sm";
          a.setAttribute("data-bs-toggle", "modal");
          a.setAttribute("data-bs-target", "#ver" + e.idPublic + "");
          var i = document.createElement("i");
          i.className = "bi-eye";
          a.appendChild(i);
          td.appendChild(a);
          a1.appendChild(i1);
          td.appendChild(a1);
          tr.appendChild(td);
          tbody.appendChild(tr);

        }
      });
    }

  });

  function filtrarPublicaciones() {
  var filtro = document.getElementById("tipomov").value;
  var filas = document.querySelectorAll("#usuarios2 tr");

  for (var i = 0; i < filas.length; i++) {
    var validada = filas[i].getAttribute("data-validada");

    if (filtro === "" || filtro === "1") {
      filas[i].style.display = ""; // Muestra todas las filas
    } else if (filtro === "2" && validada === "1") {
      filas[i].style.display = ""; // Muestra las filas de publicaciones aceptadas
    } else if (filtro === "3" && validada === "-1") {
      filas[i].style.display = ""; // Muestra las filas de publicaciones denegadas
    } else if (filtro === "4" && validada === "0") {
      filas[i].style.display = ""; // Muestra las filas de publicaciones con validada igual a 0
    } else {
      filas[i].style.display = "none"; // Oculta las demás filas
    }
  }
}
    var formulario = document.getElementById('formPubli');
    var fechaInicio = document.getElementById('fechaIni');
    var fechaFin = document.getElementById('fechaFin');

    formulario.addEventListener('submit', function(event) {
        if (fechaInicio.value >= fechaFin.value) {
        alert('La fecha de inicio debe ser anterior a la fecha de fin.');
        event.preventDefault();
        }
    });
</script>