<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>../css/estilos.css">
  
 <script src="<?php echo RUTA_URL?>/js/main.js"></script>     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Proyecto</title>
</head>
<header>
<!-- Navbar -->
<nav  class="navbar navbar-expand-lg navbar-white bg-white text-dark">
  <div class="container-fluid text-dark">
    
  <a class="navbar-brand fw-bold text-dark " href="https://cpifpbajoaragon.com/"><img style="width:30px;" class="logo-default" src="<?php echo RUTA_URL?>../imagenes/logo1.png"> CPIFP BAJO ARAGON</a>

  <a title="Cerrar sesion" href="<?php echo RUTA_URL?>/login/logout" class=" nav-link"><i class="bi bi-box-arrow-left" style="width:200%;"></i> <strong><?php echo $datos['usuarioSesion']->nombreUser?></strong></a>
 
</div>
<label class="checkeable">
				<input type="checkbox" class="form-check-input d-none" id="check" name="check" value="1" onchange="javascript:showContent()">
				<i style="cursor:pointer;" class="bi bi-universal-access-circle"></i>
</nav>
  <!-- <div class="dropdown">
  <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-person-circle"></i>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div> -->

<div class="navbar justify-content-center bg-light border-bottom border-lg-shadow" id="content" style="display:none; ">
    <div class="container d-flex" id="accesibilidad">
		<div class="fontsize col-6 d-flex justify-content-start">
			<ul style="display:flex; list-style:none;">
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return cambiarTexto('-')" id="disminuir" >A-</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return textoNormal()">A</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" name="buttonmenu" onclick="return cambiarTexto('+')" id="aumentar">A+</button>
				</li>
				<li>
					<button class="btn btn-outline-ligth" onclick="return contrasteNormal()" >R</button>
				</li>
				<li>
					<button class="btn" style="background-color:#000000 ; border: 0; color: #ffff00 ;" onclick="return contrasteNegro()" >A</button>
				</li>
				<li>
					<button  class="btn" style="background-color:#ffffcc ; border: 0; color: #000000;" onclick="return contrasteVainilla()" >A</button>
				</li>
				<li>
					<button  class="btn" style="background-color:#99ccff ; border: 0; color: #000000;" onclick="return contrasteCielo()">A</button>
				</li>
			</ul>
		</div>
    </div>
</div>

<!-- Navbar -->
</header>  
<body class="bg-light">
<script>
function showContent() {
		element = document.getElementById("content");
		check = document.getElementById("check");
		if (check.checked) {
			element.style ="z-index:995";
			element.style.position = 'fixed';
			element.style.display = 'flex';
			element.style = "box-shadow: 0 1rem 3rem rgba(black, 0.175) ";


		}
		else {
			element.style.display='none';
		}
	}
  const elementsList = document.getElementsByTagName('html');

function getElementFontSize(element){
//getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
return parseFloat(elementFontSize);  //Devolvemos el total de pixeles
}

function cambiarTexto(operador) {
for(let element of elementsList) {
   //Obtener el total de pixel de cada párrafo.
  const currentSize = getElementFontSize(element);

   //Restar o sumar, dependiendo del operador.
  const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
   //Aplicarle al parrafo actual el nuevo tamaño.
  element.style.fontSize = newFontSize
}

}
function textoNormal(){
for(let element of elementsList) {
   //Obtener el total de pixel de cada párrafo.
  const currentSize = 1;

   //Restar o sumar, dependiendo del operador.
  const newFontSize =  (currentSize) + 'rem';
   //Aplicarle al parrafo actual el nuevo tamaño.
  element.style.fontSize = newFontSize
}

}

function contrasteNegro() {

backgroundColor = "#000000";
color = "#ffff00";

document.body.setAttribute('style', 'background: '+backgroundColor+' !important;')

var h2s = document.getElementsByTagName('h2');


for (var i = 0; i<h2s.length; i++) {
  h2s[i].setAttribute('style', 'color:'+color+' !important; ');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+color+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+color+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}
}
function contrasteNormal() {
location.reload()
}

function contrasteVainilla(){
backgroundColor="#ffffcc"
color="black"

document.body.setAttribute('style', 'background: '+backgroundColor+' !important;')
var content=document.getElementById("content");
content.setAttribute('style','background:'+backgroundColor+'!important;')
var is = document.getElementsByTagName('i');


for (var i = 0; i<is.length; i++) {
  is[i].classList.remove('text-white')
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+backgroundColor+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

}

function contrasteCielo(){
backgroundColor="#99ccff"
color="black"

document.body.setAttribute('style', 'background: '+backgroundColor+' !important;')


var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var uls = document.getElementsByName('lista');


for (var i = 0; i<uls.length; i++) {
  uls[i].setAttribute('style', 'color:'+color+' !important; list-style:none; display:flex;');
}

var button = document.getElementsByName('buttonmenu');


for (var i = 0; i<button.length; i++) {
  button[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var label = document.getElementsByTagName('label');


for (var i = 0; i<label.length; i++) {
  label[i].setAttribute('style', 'color:'+color+' !important;');
}







var table = document.getElementsByTagName('table');


for (var i = 0; i<table.length; i++) {
  table[i].setAttribute('style', 'color:'+color+' !important;');
}


var p = document.getElementsByTagName('p');


for (var i = 0; i<p.length; i++) {
  p[i].setAttribute('style', 'color:'+color+' !important;');
}


var navs = document.getElementsByTagName('nav');


for (var i = 0; i<navs.length; i++) {
  navs[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}


var divs1 = document.getElementsByName('nav1');


for (var i = 0; i<divs1.length; i++) {
  divs1[i].setAttribute('style', 'background:'+backgroundColor+' !important; width:72px;height:200%;');
}


var divs = document.getElementsByTagName('div');


for (var i = 0; i<divs.length; i++) {
  divs[i].setAttribute('style', 'background:'+backgroundColor+' !important; ');
}


var h1s = document.getElementsByTagName('h5');


for (var i = 0; i<h1s.length; i++) {
  h1s[i].setAttribute('style', 'color:'+color+' !important;');
}

var h4s = document.getElementsByTagName('h4');

for (var i = 0; i<h4s.length; i++) {
  h4s[i].setAttribute('style', 'color:'+color+' !important;');
}


var h5s = document.getElementsByTagName('h1');

for (var i = 0; i<h5s.length; i++) {
  h5s[i].setAttribute('style', 'color:'+color+' !important;');
}


var tds = document.getElementsByTagName('td');

for (var i = 0; i<tds.length; i++) {
  tds[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
  
}

var as = document.getElementsByTagName('a');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;','width:3px;');

}

var button = document.getElementById('boton');
button.setAttribute('style', 'background:'+color+' !important; color:'+backgroundColor+' !important;');

var as = document.getElementsByTagName('b');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'color:'+color+' !important;');
}

var as = document.getElementsByClassName('bg-gradiente');

for (var i = 0; i<as.length; i++) {
  as[i].setAttribute('style', 'background:'+backgroundColor+' !important;');
}

}

</script>