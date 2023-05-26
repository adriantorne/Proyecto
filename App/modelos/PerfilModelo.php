
<?php

class PerfilModelo
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getUsuario($idUser)
    {
        $this->db->query(
            "SELECT * from usuario where idUser=:idUser"
        );


        $this->db->bind(':idUser', $idUser);
        return $this->db->registro();
    }
}
