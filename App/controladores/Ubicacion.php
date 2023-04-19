<?php
class Ubicacion extends Controlador{
    public function __construct(){

        Sesion::iniciarSesion($this->datos);
           
        $this->pantallaModelo = $this->modelo('PantallaModelo');
        $this->ubicacionModelo = $this->modelo('UbicacionModelo');
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }
    
    }


    public function index(){
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
           $datos=$_POST;
       
               
           if($this->ubicacionModelo->addUbicacion($datos)){
                   redireccionar("/ubicacion");
           } else{
                   echo "se ha producido un error!!!!";
           }
               
   
       }else{
        $this->datos["ubicaciones"]=$this->ubicacionModelo->getUbicaciones();
        $this->datos["pantallas"]=$this->pantallaModelo->getPantallas();
      
        $this->vista("ubicaciones/index",$this->datos);
     
       }  
    }


    public function borrar_ubicacion($idUbc){
        
     
        $this->datos["rolesPermitidos"] = [3];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
                
          
        if($this->ubicacionModelo->delUbicacion($idUbc)){
                redireccionar("/ubicacion");
                
            } else{
                echo "se ha producido un error!!!!";
            }
    
       
        
    }
    

}