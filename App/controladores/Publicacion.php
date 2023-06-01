<?php
class Publicacion extends Controlador
{
    public function __construct()
    {

        Sesion::iniciarSesion($this->datos);

        $this->publicacionModelo = $this->modelo('PublicacionModelo');
        $this->pantallaModelo = $this->modelo('PantallaModelo');
        $this->ubicacionModelo = $this->modelo('UbicacionModelo');
        $this->datos["rolesPermitidos"] = [1, 3];

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
        $this->datos["pantallas"] = $this->publicacionModelo->getPublicacionPantalla();
        $this->datos["pendientes"] = $this->publicacionModelo->getPublicacionPendientes();
        $this->datos["publicaciones"] = $this->publicacionModelo->getPublicaciones();

        $this->vista("publicaciones/index", $this->datos);
    }
    public function misPublicaciones($idUser)
    {
        $this->datos["rolesPermitidos"] = [1, 3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($this->datos['usuarioSesion']->idUser != $idUser) {
            redireccionar("/inicio");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = $_POST;
            $idPublic = $_POST['idPublic'];
            if ($this->publicacionModelo->editPublicacion($datos)) {
                $this->datos["pantallas"] = $this->publicacionModelo->getPublicacionPantalla();
                $this->datos["pendientes"] = $this->publicacionModelo->getPublicacionPendientes();
                $this->datos["mispublicaciones"] = $this->publicacionModelo->getMisPublicaciones($idUser);
                $this->vista("publicaciones/mispublicaciones", $this->datos);
            } else {
                echo "se ha producido un error!!!!";
            }
        } else {
            $this->datos["pantallas"] = $this->publicacionModelo->getPublicacionPantalla();
            $this->datos["pendientes"] = $this->publicacionModelo->getPublicacionPendientes();
            $this->datos["mispublicaciones"] = $this->publicacionModelo->getMisPublicaciones($idUser);
            $this->vista("publicaciones/mispublicaciones", $this->datos);
        }
    }
    public function ver_publicacion($idPublicacion)
    {

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
        $this->datos["publicacion"] = $this->publicacionModelo->getPublicacion($idPublicacion);

        $this->vista("publicaciones/ver_publicaciones", $this->datos);
    }


    public function borrar_publicacion($idPublicacion)
    {


        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }


        if ($this->publicacionModelo->delPublicacion($idPublicacion)) {
            redireccionar("/publicacion");
        } else {
            echo "se ha producido un error!!!!";
        }
    }

    public function validar_publicaciones()
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $motivo = $_POST["motivoDen"];
            $idPublic = $_POST['idPublic'];

            if ($this->publicacionModelo->denPublicacion($motivo, $idPublic)) {
                redireccionar("/publicacion/validar_publicaciones");
            } else {
                echo "se ha producido un error!!!!";
            }
        } else {
            $this->datos["pantallas"] = $this->publicacionModelo->getPublicacionPantalla();
            $this->datos["pendientes"] = $this->publicacionModelo->getPublicacionPendientes();

            $this->vista("publicaciones/validar_publicaciones", $this->datos);
        }
    }
    public function publicaciones_activas()
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        } else {
            $date = date('Y-m-d');
            $this->datos["pantallas"] = $this->publicacionModelo->getPublicacionPantalla();
            $this->datos["activas"] = $this->publicacionModelo->getPublicacionActiva($date);
            $this->vista("publicaciones/publicaciones_activas", $this->datos);
        }
    }
    public function validar_publicacion($idPublic)
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }

        if ($this->publicacionModelo->valPublicacion($idPublic)) {
            redireccionar("/publicacion/validar_publicaciones");
        } else {
            echo "se ha producido un error!!!!";
        }
    }
    public function desactivar_publicacion($idPublic)
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            echo "No tienes privilegios!!!";
            exit();
        }

        if ($this->publicacionModelo->desactivarPublicacion($idPublic)) {
            redireccionar("/publicacion/publicaciones_activas");
        } else {
            echo "se ha producido un error!!!!";
        }
    }
}
