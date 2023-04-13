<?php

    class PublicacionModelo {
        private $db;

        public function __construct(){
           $this->db = new Base;
        }


        public function getPublicaciones(){
            //juntar con alumno y personas para mostrar el nombre de persona
                $this->db->query("SELECT publicacion.*, usuario.nombreUser 
                FROM publicacion, usuario 
                WHERE publicacion.idUser = usuario.idUser and (validada='1' or validada='-1') order by fechaInicio desc");
     
        return $this->db->registros();
    }
    public function getPublicacion($idPublic){

          

                    $this->db->query("SELECT publicacion.*,usuario.nombreUser
                    FROM publicacion, usuario
                    WHERE idPublic=:idPublic and  publicacion.idUser = usuario.idUser");
                    $this->db->bind(':idPublic', $idPublic);
                    
                    return $this->db->registro();
        
                }
        function delPublicacion($idPublicacion){

            $this->db->query("DELETE FROM asignar where idPublic=:idPublicacion");
            $this->db->bind(':idPublicacion', $idPublicacion);

            $this->db->execute();

            $this->db->query("DELETE FROM publicacion where idPublic=:idPublicacion");
            $this->db->bind(':idPublicacion', $idPublicacion);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    }