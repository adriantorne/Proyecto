<?php

//**Desarrollo */
ini_set('display_errors',1);
ini_set('display_starup_errors',1);
error_reporting(E_ALL);
//**Desarrollo */

//Ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));

//Ruta url, Ejemplo: http://localhost/atletismo
define('RUTA_URL', 'https://localhost/Proyecto');

define('NOMBRE_SITIO', 'Sarabastall1');

//configuracio de la base de datos
date_default_timezone_set('Europe/Madrid');
define('DB_HOST', '127.0.0.1');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_NOMBRE','proyecto');
define('EmailEmisor','adrian.torne@memorandum.net');
define('EmailPass','%218xlMb');
define('Emisor','Adrian Torne');
define('Host','mail.memorandum.net');
define('SMTPSecure','TLS');
define('Puerto',587);