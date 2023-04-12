<?php

class Inicio extends Controlador{
    public function __construct(){
    //     Sesion::iniciarSesion($this->datos);

        
    //     $this->datos["rolesPermitidos"] = [10,20,30];

    //    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
    //         echo "No tienes privilegios!!!";
    //         exit();
    //        redireccionar('/');
    //     }
        
   }

    public function index(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
        
         
        }else {
            $this->vista("index", $this ->datos);
        }
    }
}