<?php
class Perfil extends Controlador
{
    public function __construct()
    {

        Sesion::iniciarSesion($this->datos);

        $this->perfilModelo = $this->modelo('PerfilModelo');
        $this->usuarioModelo = $this->modelo('UsuarioModelo');
        $this->datos["rolesPermitidos"] = [1, 3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
    }

    public function index($idUser, $error = '')
    {
        $this->datos["rolesPermitidos"] = [1, 3];

        if (!tienePrivilegios($this->datos['usuarioSesion']->rol, $this->datos['rolesPermitidos'])) {
            redireccionar("/inicio");
        }
        if ($this->datos['usuarioSesion']->idUser != $idUser) {
            redireccionar("/inicio");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($datos = $_POST);
            $this->datos["usuario"] = $this->perfilModelo->getUsuario($idUser);
            if ($datos['idUser'] != "" && $datos['claveNueva' == ""]) {
                if ($this->usuarioModelo->editUsuario($datos)) {

                    redireccionar("/perfil/index/$idUser/error_1");
                }
            } elseif ($datos['claveNueva'] != "") {
                if ($this->usuarioModelo->getClave($datos)) {
                    if ($this->usuarioModelo->cambiarClave($datos)) {
                        redireccionar("/perfil/index/$idUser");
                    }
                }
            }
        } else {
            $this->datos['error'] = $error;
            $this->datos["usuarios"] = $this->perfilModelo->getUsuario($idUser);
            $this->vista("perfil/index", $this->datos);
        }
    }
}
