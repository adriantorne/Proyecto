<?php

class Inicio extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);

        $this->pantallaModelo = $this->modelo('PantallaModelo');
        $this->datos["rolesPermitidos"] = [1,3];

    //    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
    //         echo "No tienes privilegios!!!";
    //         exit();
    //        redireccionar('/');
    //     }
        
   }

    public function index(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
        
         
        }else {
            $this->datos["pantallas"]=$this->pantallaModelo->getPantallas();
            $this->vista("index", $this ->datos);
        }
    }
}