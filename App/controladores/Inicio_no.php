<?php

class Inicio_no extends Controlador{
    public function __construct(){
        
        //$this->contactoModelo=$this->modelo('ContactoModelo');
    }

    public function index(){
       
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos=$_POST;
            print_r($datos);
        }else {
            $this->vista("inicio_no_logueado", $this ->datos);
        }
    }
}