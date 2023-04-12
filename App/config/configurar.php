<?php

//**Desarrollo */
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//**Desarrollo */

//Ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));

//Ruta url, Ejemplo: http://localhost/atletismo
define('RUTA_URL', 'http://localhost/miproyecto.com');

define('NOMBRE_SITIO', 'Sarabastall1');

//configuracio de la base de datos

define('DB_HOST', '192.168.4.238');
define('DB_USUARIO', 'root');

define('DB_NOMBRE','proyecto');
define('EmailEmisor','infoargo@cpifpbajoaragon.com');
define('EmailPass','infoargo_23');
define('Emisor','infoargo infoargo');
define('Host','smtp.ionos.es');
define('SMTPSecure','TLS');
define('Puerto',587);