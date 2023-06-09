<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>



<div class="container mt-2">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo RUTA_URL ?>">Home</a></li>
      <li id="lipan" class="breadcrumb-item active" aria-current="page">Publicaciones</li>
    </ol>
  </nav>
  <h2 class="text-center"><strong>Historico publicaciones <i class="bi bi-book"></i></strong> </h2>
  <?php if ($datos['publicaciones'] != []) : ?>
    <div class="row col-12">
      <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end col-8">


        <select name="tipomov" id="tipomov" class="form-select" onchange="filtrarPublicaciones()">
          <option value="" selected disabled>Seleccione un estado de publicacion...</option>
          <option value="1">Todos</option>
          <option value="2">Aceptadas</option>
          <option value="3">Denegadas</option>
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
    <?php if (count($datos["publicaciones"]) > 5) : ?>
      <table class="table table-hover shadow">
        <thead>
          <tr style="background-color:#043b83;" class="text-light">

            <th scope="col">Titulo</th>
            <th scope="col">Fecha Creación</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>

            <th scope="col">Usuario</th>
            <th scope="col">Estado</th>
            <th></th>


          </tr>
        </thead>
        <tbody id="usuarios">
          <tr>
      </table>








      <nav aria-label=" Page navigation example ">
        <ul class="pagination d-flex justify-content-center">
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
      <div id="normal">

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

            <th scope="col">Usuario</th>
            <th scope="col">Estado</th>
            <th></th>


          </tr>
        </thead>
        <tbody id="usuarios2">
          <?php foreach ($datos["publicaciones"] as $publicacion) : ?>
            <tr data-validada="<?php echo $publicacion->validada; ?>">

              <td><?php echo $publicacion->tituloPublic ?></td>
              <td><?php echo $publicacion->fechaCreacion ?></td>
              <td><?php echo $publicacion->fechaInicio ?></td>
              <td><?php echo $publicacion->fechaLimite ?></td>
              <td><?php echo $publicacion->nombreUser ?></td>
              <?php if ($publicacion->validada == "1") : ?>
                <td style="color:green;"><strong>APROBADA</strong></td>
              <?php elseif ($publicacion->validada == "-1") : ?>
                <td style="color:red;"><strong>DENEGADA</strong></td>
              <?php endif ?>
              <td>
                <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#ver<?php echo $publicacion->idPublic ?>"><i class="bi bi-eye"></i></a>
                <a class="btn btn-outline-danger btn-sm"  onclick="confirmar(event)" href="<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/<?php echo $publicacion->idPublic ?>"><i class="bi-trash"></i></a>
              </td>

            </tr>
          <?php endforeach ?>
      </table>

    <?php endif ?>
  <?php else : ?>
    <h2>El histórico de publicaciones esta vacio</h2>
  <?php endif ?>

  </body>

  </html>
  <?php foreach ($datos["publicaciones"] as $pendientes) : ?>


    <div class="modal fade" id="ver<?php echo $pendientes->idPublic ?>">

      <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

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
            <p class="mt-2">Creada por: <?php echo $pendientes->nombreUser ?></p>
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
  <?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>
  <script>
    //paginacion, creado de tabla//

    const datosTabla = <?php echo json_encode($datos['publicaciones']) ?>;
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
        page = 5;
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

          } else {
            validada = "DENEGADA"
          }

          listing_table.innerHTML += '<td>' + datosTabla[i].tituloPublic + '</td><td>' + datosTabla[i].fechaCreacion + '</td><td>' + datosTabla[i].fechaInicio + '</td><td>' + datosTabla[i].fechaLimite + '</td><td>' + datosTabla[i].nombreUser + '</td><td class="valor">' + validada + '</td><td><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver' + datosTabla[i].idPublic + '""' +
            '"><i class="bi bi-eye"></i></a> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/' +
            datosTabla[i].idPublic + '"><i class="bi-trash" ></i></a></td></tr></tbody></table>';

          let td = document.getElementsByClassName('valor');

          for (let i = 0; i < td.length; i++) {

            //console.log(td[i].innerHTML);

            //console.log(td[i]);

            if (td[i].innerHTML == 'DENEGADA') {

              td[i].style.color = 'red';
              td[i].setAttribute('class', 'fw-bold')

            } else {
              td[i].style.color = 'green';
              td[i].setAttribute('class', 'fw-bold')
            }

          }
        }
      } else {
        var validada = "";
        for (var i = (page - 1) * obj_per_page; i < (page * obj_per_page); i++) {
          if (datosTabla[i].validada == "1") {
            validada = "APROBADA"

          } else {
            validada = "DENEGADA"
          }
          listing_table.innerHTML += '<td>' + datosTabla[i].tituloPublic + '</td><td>' + datosTabla[i].fechaCreacion + '</td><td>' + datosTabla[i].fechaInicio + '</td><td>' + datosTabla[i].fechaLimite + '</td><td>' + datosTabla[i].nombreUser + '</td><td class="valor">' + validada + '</td><td><a class="btn btn-outline-success btn-sm"  data-bs-toggle="modal" data-bs-target="#ver' + datosTabla[i].idPublic + '""' +
            '"><i class="bi bi-eye"></i></a> <a class="btn btn-outline-danger btn-sm" onclick="confirmar(event)" href="<?php echo RUTA_URL ?>/publicacion/borrar_publicacion/' +
            datosTabla[i].idPublic + '"><i class="bi-trash" ></i></a></td></tr></tbody></table>';


          let td = document.getElementsByClassName('valor');

          for (let i = 0; i < td.length; i++) {

            //console.log(td[i].innerHTML);

            //console.log(td[i]);

            if (td[i].innerHTML == 'DENEGADA') {

              td[i].style.color = 'red';
              td[i].setAttribute('class', 'fw-bold')

            } else {
              td[i].style.color = 'green';
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
    const movimiento = <?php echo json_encode($datos['publicaciones']) ?>;
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
          tdText = document.createTextNode(e.nombreUser);
          td.appendChild(tdText);
          tr.appendChild(td);

          td = document.createElement("td");

          if (e.validada == 1) {
            tdText = document.createTextNode("APORBADA");
            td.appendChild(tdText);
            td.style.color = "green";
            td.setAttribute('class', 'fw-bold')
          } else {
            tdText = document.createTextNode("DENEGADA");
            td.appendChild(tdText);
            td.style.color = "red";
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
            tdText = document.createTextNode(e.nombreUser);
            td.appendChild(tdText);
            tr.appendChild(td);

            td = document.createElement("td");

            if (e.validada == 1) {
              tdText = document.createTextNode("APORBADA");
              td.appendChild(tdText);
              td.style.color = "green";
              td.setAttribute('class', 'fw-bold')
            } else {
              tdText = document.createTextNode("DENEGADA");
              td.appendChild(tdText);
              td.style.color = "red";
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
            tdText = document.createTextNode(e.nombreUser);
            td.appendChild(tdText);
            tr.appendChild(td);

            td = document.createElement("td");

            if (e.validada == 1) {
              tdText = document.createTextNode("APORBADA");
              td.appendChild(tdText);
              td.style.color = "green";
              td.setAttribute('class', 'fw-bold')
            } else {
              tdText = document.createTextNode("DENEGADA");
              td.appendChild(tdText);
              td.style.color = "red";
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
        console.log(filas);
        if (filtro === "" || filtro === "1") {
          filas[i].style.display = ""; // Muestra todas las filas
        } else if (filtro == "2" && validada == "1") {
          filas[i].style.display = ""; // Muestra las filas de publicaciones aceptadas
        } else if (filtro == "3" && validada == "-1") {
          filas[i].style.display = ""; // Muestra las filas de publicaciones denegadas
        } else {
          filas[i].style.display = "none"; // Oculta las demás filas
        }
      }
    }
//     $('#btnEliminarRemesa').on('click', function() {
  
//   let settings_ajax = $.extend(true, {}, form.settings.ajax);
//   settings_ajax.method = 'POST';
//   settings_ajax.url = Common.settings.baseUrl + 'facturacion/remesa_bancaria/eliminar_remesa_bancaria';
//   settings_ajax.data = encodeURIComponent(form.settings.csrf.name) + '=' + encodeURIComponent(form.settings.csrf.hash) + '&input_idRemesa='+ "input_idRemesa";

//   settings_ajax.success = function(responseData) {
//     form.settings.responseData = responseData;
//     form.settings.csrf.name = responseData.csrf.name;
//     form.settings.csrf.hash = responseData.csrf.hash;
//     form.rebuildCsrfHash();
    
//     if(responseData.estado === 'true') {
//         $('#remesas_bancarias_table').DataTable().ajax.reload()
//         $('#modal_eliminar_remesa_bancaria').modal('hide')
//         toastr.clear();
//         toastr.success('Remesa eliminada correctamente.');
//     }
//     else {
//         toastr.clear();
//         toastr.error(responseData.mensaje);
//     }
//   };
//   $.ajax(settings_ajax);
// });
  </script>
  <!-- Modal -->