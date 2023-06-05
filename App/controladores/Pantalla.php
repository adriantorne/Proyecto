<?php
class Pantalla extends Controlador
{
    public function __construct()
    {

        Sesion::iniciarSesion($this->datos);
        $this->publicacionModelo = $this->modelo('PublicacionModelo');
        $this->pantallaModelo = $this->modelo('PantallaModelo');
        $this->ubicacionModelo = $this->modelo('UbicacionModelo');
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
    }


    public function index()
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = $_POST;
            if ($datos['idPantalla']) {
                if ($this->pantallaModelo->editPantalla($datos)) {
                    redireccionar("/pantalla");
                }
            }

            if ($this->pantallaModelo->addPantalla($datos)) {
                redireccionar("/pantalla");
            } else {
                echo "se ha producido un error!!!!";
            }
        } else {
            $this->datos["ubicaciones"] = $this->ubicacionModelo->getUbicaciones();
            $this->datos["pantallas"] = $this->pantallaModelo->getPantallas();

            $this->vista("pantallas/index", $this->datos);
        }
    }

    public function ver_pantalla($idPantalla)
    {
        
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }
        $date = date('Y-m-d');
        $this->datos["pantalla"] = $this->pantallaModelo->getPantalla($idPantalla);
        $this->datos['publicacion'] = $this->publicacionModelo->getPublicacionPorPantalla($idPantalla, $date);
        $this->vista("pantallas/verPantalla", $this->datos);
    }
    public function borrar_pantalla($idPantalla)
    {


        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }


        if ($this->pantallaModelo->delPantalla($idPantalla)) {
            redireccionar("/pantalla");
        } else {
            echo "se ha producido un error!!!!";
        }
    }

    public function editar_pantalla($datos)
    {
        $datos = $_POST;
        print_r($datos);
        exit();
    }
    public function insertar_pantalla(){
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($this->pantallaModelo->addPantalla($datos)) {
            redireccionar("/pantalla");
        } else {
            echo "se ha producido un error!!!!";
        }
    }
}
