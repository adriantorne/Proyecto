<?php

    class PantallaModelo {
        private $db;

        public function __construct(){
           $this->db = new Base;
        }

        public function getPantallas(){
            //juntar con alumno y personas para mostrar el nombre de persona
                $this->db->query("SELECT pantalla.*, ubicacion.nombreUbc 
                FROM pantalla, ubicacion 
                WHERE pantalla.idUbc = ubicacion.idUbc");
     
        return $this->db->registros();
    }



    public function addPantalla($datos){
        $this->db->query("INSERT INTO pantalla (nombrePantalla, mac, idUbc) 
        VALUES (:nombrePan, :mac, :ubicacion)");

            $this->db->bind(':nombrePan' ,trim($datos['nombrePan']));
            $this->db->bind(':mac' ,trim($datos['mac'])); 
            $this->db->bind(':ubicacion' ,trim($datos['ubicacion']));
            
            
            if ($this->db->execute()) {
               
                return true;
            }else{
                return false;
            }

    }
    public function editPantalla($datos){
            
        $this->db->query("UPDATE pantalla SET nombrePantalla=:nombrePan, MAC=:mac, idUbc=:ubicacion
        WHERE idPantalla=:idPantalla");


            $this->db->bind(':idPantalla' ,trim($datos['idPantalla']));
            $this->db->bind(':nombrePan' ,trim($datos['nombrePan']));
            $this->db->bind(':mac' ,trim($datos['mac'])); 
            $this->db->bind(':ubicacion' ,trim($datos['ubicacion']));
            
            
            if ($this->db->execute()) {
               
                return true;
            }else{
                return false;
            }

    }
    function delPantalla($idPantalla){


        $this->db->query("DELETE FROM asignar where idPantalla=:idPantalla");
        $this->db->bind(':idPantalla', $idPantalla);

       

        $this->db->execute();

        $this->db->query("DELETE FROM pantalla where idPantalla=:idPantalla");
        $this->db->bind(':idPantalla', $idPantalla);

        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }
}
