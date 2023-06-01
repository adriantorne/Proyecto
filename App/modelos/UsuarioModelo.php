<?php

class UsuarioModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }


    public function getUsuarios()
    {
        $this->db->query("SELECT usuario.*,departamento.*,rol.*
                FROM usuario,departamento,rol where usuario.idDpto = departamento.idDpto and rol.idRol = usuario.rol and estado=1");

        return $this->db->registros();
    }

    public function getDepartamentos()
    {
        $this->db->query("SELECT *
                FROM departamento ");

        return $this->db->registros();
    }
    public function getRoles()
    {
        $this->db->query("SELECT *
                FROM rol ");

        return $this->db->registros();
    }


    public function addUsuario($datos)
    {
     
        $this->db->query("INSERT INTO usuario (nombreUser, claveUser, nombre, apellido, idDpto, email, telefono,rol,estado) 
            VALUES (:nombreUser,sha2(:claveUser,256),:nombre,:apellido,:Dpto,:email,:telefono,:rol,1)");

        //vinculamos los valores
        $this->db->bind(':nombreUser', trim($datos['nombreUser']));
        $this->db->bind(':claveUser', trim($datos['claveUser']));
        $this->db->bind(':nombre', trim($datos['nombre']));
        $this->db->bind(':apellido', trim($datos['apellido']));
        $this->db->bind(':email', trim($datos['email']));
        $this->db->bind(':Dpto', $datos['dpto']);
        $this->db->bind(':rol', $datos['rol']);
        $this->db->bind(':telefono', $datos['telefono']);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getCantDes()
    {
        $this->db->query("SELECT count(idUser) as cantidad
            FROM usuario
            WHERE estado=0");
        return $this->db->registros();
    }
    public function desUsuario($idUser)
    {
        $this->db->query("UPDATE usuario set estado=0 where idUser=:idUser");
        $this->db->bind(':idUser', $idUser);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getDeshabilitados()
    {

        $this->db->query("SELECT usuario.*,departamento.*,rol.*
                    FROM usuario,departamento,rol where usuario.idDpto = departamento.idDpto and rol.idRol = usuario.rol and estado=0");

        return $this->db->registros();
    }
    public function activarUsuario($idUser)
    {
        $this->db->query("UPDATE usuario set estado=1 where idUser=:idUser");
        $this->db->bind(':idUser', $idUser);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function editUsuario($datos)
    {

        $this->db->query("UPDATE usuario set nombreUser=:nombreUser, nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono, idDpto=:Dpto, rol=:rol where idUser=:idUser");

        $this->db->bind(':nombreUser', trim($datos['nombreUser']));
        $this->db->bind(':idUser', trim($datos['idUser']));
        $this->db->bind(':nombre', trim($datos['nombre']));
        $this->db->bind(':apellido', trim($datos['apellido']));
        $this->db->bind(':email', trim($datos['email']));
        $this->db->bind(':Dpto', $datos['dpto']);
        $this->db->bind(':rol', $datos['rol']);
        $this->db->bind(':telefono', $datos['telefono']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }
    public function getClave($datos)
    {
        $this->db->query(
            "SELECT claveUser from usuario where claveUser=sha2(:claveUser,256) and idUser=:idUser"
        );

        $this->db->bind(':claveUser', $datos['claveActual']);
        $this->db->bind(':idUser', $datos['idUser']);
        return $this->db->registro();
    }

    public function cambiarClave($datos)
    {


        $this->db->query("UPDATE usuario set claveUser=sha2(:claveUsernueva,256) where claveUser=sha2(:claveUser,256) and idUser=:idUser");

        $this->db->bind(':claveUser', $datos['claveActual']);
        $this->db->bind(':claveUsernueva', $datos['claveNueva']);
        $this->db->bind(':idUser', $datos['idUser']);
        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function recuperarPass($to, $passCifrada)
    {
        $this->db->query("UPDATE usuario SET  claveUser=sha2(:user_pass,256) WHERE email = :user_email");
        $this->db->bind(':user_email', $to);
        $this->db->bind(':user_pass', $passCifrada);

        // if ($this->db->execute()) {
        //     return true;
        //     print_r("sdsdsds");
        // }else{
        //     return false;
        // }
        //ejecutamos
        try {
            $this->db->execute();
        } catch (\Throwable $th) {
            print_r("Ha ocurrido un error actualizando el usuario. Inténtelo de nuevo más tarde.");
        }
    }
}
