<?php

class Beca extends Controlador{
    public function __construct(){

        Sesion::iniciarSesion($this->datos);
           
        $this->becaModelo = $this->modelo('BecaModelo');

        $this->datos["rolesPermitidos"] = [10];

        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }

    }


    public function index(){
        $this->datos["becas"]=$this->becaModelo->getTipoBeca();
      
        $this->vista("becas/index",$this->datos);
     
        
    }

    
    public function add_becas($error=0){

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $beca = $_POST;

            $nombre=$this->datos["alumno"]=$this->becaModelo->getPersona($beca["alumno_be"]);
                
                
            if ($this->becaModelo->addBeca($beca,$nombre->Nombre)) {
                redireccionar("/beca");
            }else{
                echo "error";
            }
   
        }else{           
            $this->datos["madrinas"]=$this->becaModelo->getMadrinas();
            $this->datos["centros"]=$this->becaModelo->getCentros();
            $this->datos["tipoBeca"]=$this->becaModelo->getTipoBeca();
            $this->datos["alumno"]=$this->becaModelo->getPersonas();
            $this->datos["fechas"]=$this->becaModelo->getFechaFin(); 
            $this->datos["menuActivo"]="";
            $this->datos["error"]=$error;
            $this->vista("becas/add_becas",$this->datos);
        }    
    }


   

    public function ver_becas($idTipoBeca){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }

        $this->datos["beca"]=$this->becaModelo->getBecas($idTipoBeca);
        $this->datos["tipoBeca"]=$this->becaModelo->getTipoBeca2($idTipoBeca);
        
        if ($this->datos["tipoBeca"]->idTipoBeca==2) {
            
            if (!$this->datos["beca"]=="") {
                $idMadrina=$this->datos["beca"][0]->Madrina_idPersona;
            $this->datos["madrina"]=$this->becaModelo->getMadrina($idMadrina);
            }
            
        }
        

        $this->vista("becas/ver_becas",$this->datos);
            
    
}


public function ver_beca($idBeca){
  
    $this->datos["rolesPermitidos"] = [10];
        
    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
        echo "No tienes privilegios!!!";
        exit();
       
    }

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $idTipoBeca=$_POST["tipoBeca"];
        $beca=$_POST;
        $idBeca=$idBeca;
        $nombre=$this->datos["alumno"]=$this->becaModelo->getPersona($beca["alumno_be"]);
            
        if($this->becaModelo->editBeca($beca,$idBeca,$nombre->Nombre)){
                redireccionar("/beca");
        } else{
                echo "se ha producido un error!!!!";
        }
            

    }else{
        $this->datos["becas"]=$this->becaModelo->getBecas2($idBeca);
        $this->datos["centros"]=$this->becaModelo->getCentros();
        $this->vista("becas/ver_beca",$this->datos);

      
    }

}




    public function eliminar_beca($idBeca){

        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
                
           $idBeca=$_POST['idBeca'];
           $idTipoBeca=$_POST['tipoBeca'];
            if($this->becaModelo->delBeca($idBeca)){
                redireccionar("/beca/ver_becas/$idTipoBeca");
                
            } else{
                echo "se ha producido un error!!!!";
            }

       
        
    }
    public function add_pago($idBeca){
        $this->datos["rolesPermitidos"] = [10];
            
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
    
        $datos=$_POST;
        
        $tipoBeca=$_POST['tipoBeca'];
        print_r($datos);
   
            if($this->becaModelo->addPago1($datos)){
                redireccionar("/beca/ver_becas/$tipoBeca");
            }else{
                echo "error";
            }
     
    }
    public function add_pago2($idBeca){
        $this->datos["rolesPermitidos"] = [10];
            
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }
        $datos=$_POST;
        
        $tipoBeca=$_POST['tipoBeca'];
        print_r($datos);
   
            if($this->becaModelo->addPago2($datos)){
                redireccionar("/beca/ver_becas/$tipoBeca");
            }else{
                echo "error";
            }
    }

    public function ver_becados(){
        $this->datos["rolesPermitidos"] = [10];
        
        if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
           
        }

        $fechaini=$_POST['fechaini'];
        $fechafin=$_POST['fechafin'];
        $fechaininueva=$fechaini."-01-01";
       
        if($fechaini==$fechafin){
            $fechafinnueva=$fechaini."-12.31";
        }else{
            $fechafinnueva=$fechafin."-01-01";
        }
        
        $this->datos["becados"]=$this->becaModelo->getBecados($fechaininueva,$fechafinnueva);
     
        $this->vista("becas/ver_becados",$this->datos);
        
    

    }


}