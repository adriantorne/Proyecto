<?php
class Publicacion extends Controlador{
    public function __construct(){

        Sesion::iniciarSesion($this->datos);
           
        $this->publicacionModelo = $this->modelo('PublicacionModelo');

        $this->datos["rolesPermitidos"] = [1,3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }

    }


    public function index(){
           $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }
        $this->datos["publicaciones"]=$this->publicacionModelo->getPublicaciones();
      
        $this->vista("publicaciones/index",$this->datos);
     
        
    }
    public function ver_publicacion($idPublicacion){
  
        $this->datos["rolesPermitidos"] = [3];
            
        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
    
       // if ($_SERVER["REQUEST_METHOD"]=="POST") {
            // $idTipoBeca=$_POST["tipoBeca"];
            // $beca=$_POST;
            // $idBeca=$idBeca;
            // $nombre=$this->datos["alumno"]=$this->becaModelo->getPersona($beca["alumno_be"]);
                
            // if($this->becaModelo->editBeca($beca,$idBeca,$nombre->Nombre)){
            //         redireccionar("/beca");
            // } else{
            //         echo "se ha producido un error!!!!";
            // }
                
    
        //}else{
            $this->datos["publicacion"]=$this->publicacionModelo->getPublicacion($idPublicacion);

            $this->vista("publicaciones/ver_publicaciones",$this->datos);
    
          
        }
    
    
    public function borrar_publicacion($idPublicacion){
        
      
        $this->datos["rolesPermitidos"] = [3];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
                
          
            if($this->publicacionModelo->delPublicacion($idPublicacion)){
                redireccionar("/publicacion");
                
            } else{
                echo "se ha producido un error!!!!";
            }

       
        
    }

}