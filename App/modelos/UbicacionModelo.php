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



    function delUbicacion($idUbc){

       
        $this->db->query("DELETE FROM pantalla where idUbc=:idUbc");
        $this->db->bind(':idUbc', $idUbc);

        $this->db->execute();

        $this->db->query("DELETE FROM ubicacion where idUbc=:idUbc");
        $this->db->bind(':idUbc', $idUbc);

       

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }
}