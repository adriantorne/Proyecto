<?php

    class UbicacionModelo {
        private $db;

        public function __construct(){
           $this->db = new Base;
        }

        public function getUbicaciones(){
            //juntar con alumno y personas para mostrar el nombre de persona
                $this->db->query("SELECT *
                FROM ubicacion");
     
        return $this->db->registros();
    }

    public function addUbicacion($datos){
        $this->db->query("INSERT INTO ubicacion (nombreUbc) 
        VALUES (:nombreUbc)");

            $this->db->bind(':nombreUbc' ,trim($datos['nombreUbc']));
         
            
            
            if ($this->db->execute()) {
               
                return true;
            }else{
                return false;
            }
    }
}