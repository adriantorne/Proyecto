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

    }