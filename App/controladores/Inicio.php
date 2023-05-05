<?php

class Inicio extends Controlador{
    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->usuarioModelo = $this->modelo('UsuarioModelo');
        $this->pantallaModelo = $this->modelo('PantallaModelo');
        $this->publicacionModelo = $this->modelo('PublicacionModelo');
        $this->datos["rolesPermitidos"] = [1,3];

    //    if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
    //         echo "No tienes privilegios!!!";
    //         exit();
    //        redireccionar('/');
    //     }
        
   }

    public function index(){

        $this->datos["rolesPermitidos"] = [1,3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
          
        }

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $datos=$_POST;
         
            if($_FILES['publiImg']){
            $foto = $_FILES['publiImg']['name'];
         
            $tipo = $_FILES['publiImg']['type'];
            
            $temp = $_FILES['publiImg']['tmp_name'];
          
            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
               - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            } else {
                //If the image is correct in size and type
                //Trying to upload to the server
                if (move_uploaded_file($temp, "/wamp64/www/Proyecto/public/img/".$foto)) {
                    //Change the permissions of the file to 777 to be able to modify it later
                    chmod("/wamp64/www/Proyecto/public/img/".$foto, 0777);
                }
               
            }
            if ($this->publicacionModelo->addPublicacion($datos,$foto)) {
                redireccionar("/Inicio");
            }else{
                echo "error";
            }
        }else{
            $foto="NULL";
            if ($this->publicacionModelo->addPublicacion($datos,$foto)) {
                redireccionar("/Inicio");
            }else{
                echo "error";
            }
        }
          
         
        }else {
            $this->datos['publicacion']=$this->publicacionModelo->getCantPubl();
            $this->datos["pantallas"]=$this->pantallaModelo->getPantallas();
            $this->vista("index", $this ->datos);
        }
    }

    // public function add_publicacion(){
    //     if ($_SERVER['REQUEST_METHOD']=='POST') {
    //     $datos=$_POST;
    //     print_r($datos);
    //     exit();
    //     }
    // }
}