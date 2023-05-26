<?php

class Usuario extends Controlador
{
    public function __construct()
    {

        Sesion::iniciarSesion($this->datos);

        $this->usuarioModelo = $this->modelo('UsuarioModelo');
        $this->publicacionModelo = $this->modelo('PublicacionModelo');
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
    }


    public function index($error = '')
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = $_POST;
            if ($datos['idUser'] == "" && $datos['claveNueva'] == "") {
                if ($this->usuarioModelo->addUsuario($datos)) {
                    redireccionar("/usuario");
                }
            } elseif ($datos['idUser'] != "" && $datos['claveNueva'] == "") {
                if ($this->usuarioModelo->editUsuario($datos)) {
                    redireccionar("/usuario");
                }
            } else {
                if ($this->usuarioModelo->getClave($datos)) {
                    if ($this->usuarioModelo->cambiarClave($datos)) {
                        redireccionar("/usuario");
                    }
                } else {
                    redireccionar("/usuario/error_1");
                }
            }
        } else {

            $this->datos["publicaciones"] = $this->publicacionModelo->getPublicaciones();
            $this->datos['deshabilitados'] = $this->usuarioModelo->getDeshabilitados();
            $this->datos["cantidad"] = $this->usuarioModelo->getCantDes();
            $this->datos["departamentos"] = $this->usuarioModelo->getDepartamentos();
            $this->datos["rol"] = $this->usuarioModelo->getRoles();
            $this->datos["usuarios"] = $this->usuarioModelo->getUsuarios();
            $this->datos['error'] = $error;
            $this->vista("usuarios/index", $this->datos);
        }
    }
    public function deshabilitar_usuario($idUser)
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($this->usuarioModelo->desUsuario($idUser)) {
            redireccionar("/usuario");
        }
    }
    public function activar_usuario($idUser)
    {
        $this->datos["rolesPermitidos"] = [3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($this->usuarioModelo->activarUsuario($idUser)) {
            redireccionar("/usuario");
        }
    }
    public function editar_usuario()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "hola";
        }
    }


    public function cambiar_clave()
    {


        $claveActual = $_POST;
        print_r($claveActual);
        exit();
    }
}
