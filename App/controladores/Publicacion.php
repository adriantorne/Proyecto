<?php
class Publicacion extends Controlador{
    public function __construct(){

        // Sesion::iniciarSesion($this->datos);
           
        $this->publicacionModelo = $this->modelo('PublicacionModelo');

        // $this->datos["rolesPermitidos"] = [10];

        // if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
        //     redireccionar("/inicio");
          
        // }

    }


    public function index(){
        $this->datos["publicaciones"]=$this->publicacionModelo->getPublicaciones();
      
        $this->vista("publicaciones/index",$this->datos);
     
        
    }
}