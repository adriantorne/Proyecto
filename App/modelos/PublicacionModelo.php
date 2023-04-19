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
                WHERE publicacion.idUser = usuario.idUser and (validada='1' or validada='-1') order by fechaCreacion desc");
     
        return $this->db->registros();
    }


    
    public function getPublicacionPendientes(){
        //juntar con alumno y personas para mostrar el nombre de persona
            $this->db->query("SELECT publicacion.*, usuario.nombreUser, pantalla.nombrePantalla
            FROM publicacion, usuario, pantalla, asignar
            WHERE publicacion.idUser = usuario.idUser and validada='0' and publicacion.idPublic = asignar.idPublic and asignar.idPantalla = pantalla.idPantalla group by idPublic order by fechaCreacion desc");
 
    return $this->db->registros();
}
 public function getPublicacionPantalla(){
    $this->db->query("SELECT publicacion.idPublic, pantalla.nombrePantalla FROM publicacion 
    left JOIN asignar ON asignar.idPublic=publicacion.idPublic
    left JOIN pantalla ON pantalla.idPantalla= asignar.idPantalla");
 
    return $this->db->registros();
 }


     public function getCantPubl(){
        $this->db->query("SELECT count(idPublic) as cantidad
        FROM publicacion
        WHERE validada='0'");
        return $this->db->registros();

     }
 
    public function getPublicacion($idPublic){

          

                    $this->db->query("SELECT publicacion.*,usuario.nombreUser
                    FROM publicacion, usuario
                    WHERE idPublic=:idPublic and  publicacion.idUser = usuario.idUser");
                    $this->db->bind(':idPublic', $idPublic);
                    
                    return $this->db->registro();
        
                }



                public function addPublicacion($datos,$foto){

                    
                    if($foto!="NULL"){

                    $this->db->query("INSERT INTO publicacion(fechaCreacion, tituloPublic, mensajePublic, archivo,fechaInicio,fechaLimite,idUser,validada)
                 VALUES(NOW(), :titulo, :mensaje, :imagen, :fechaInicio, :fechaFin,:usuario,'0')");
                $this->db->bind(':titulo',trim($datos['titulo']));
                $this->db->bind(':mensaje',trim($datos['mensaje']));
                $this->db->bind(':imagen',$foto);
                $this->db->bind(':fechaInicio',trim($datos['fechaInicio']));
                $this->db->bind(':fechaFin',trim($datos['fechaFin']));
                $this->db->bind(':usuario',$datos['usuario']);
             
               

                $idPublic = $this->db->executeLastId();

                foreach($datos['pantalla']as $pantalla){
                    $this->db->query("INSERT INTO asignar(idPublic, idPantalla)
                    VALUES(:id,:pantalla)");
                   $this->db->bind(':id',trim($idPublic));
                   $this->db->bind(':pantalla',$pantalla);
                
                   $this->db->execute();
                }

           return true;

            }else{
                $this->db->query("INSERT INTO publicacion(fechaCreacion, tituloPublic, mensajePublic, archivo,fechaInicio,fechaLimite,idUser,validada)
                VALUES(NOW(), :titulo, :mensaje, NULL, :fechaInicio, :fechaFin,:usuario,'0')");
               $this->db->bind(':titulo',trim($datos['titulo']));
               $this->db->bind(':mensaje',trim($datos['mensaje']));
               
               $this->db->bind(':fechaInicio',trim($datos['fechaInicio']));
               $this->db->bind(':fechaFin',trim($datos['fechaFin']));
               $this->db->bind(':usuario',$datos['usuario']);
            
              

           
               $idPublic = $this->db->executeLastId();

               foreach($datos['pantalla']as $pantalla){
                   $this->db->query("INSERT INTO asignar(idPublic, idPantalla)
                   VALUES(:id,:pantalla)");
                  $this->db->bind(':id',trim($idPublic));
                  $this->db->bind(':pantalla',$pantalla);
               
                  $this->db->execute();
               }

          return true;
            }
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

                function valPublicacion($idPublic){

                  
                    $this->db->query("UPDATE publicacion set validada='1' where idPublic = :idPublicacion");
                    $this->db->bind(':idPublicacion', $idPublic);
                    if ($this->db->execute()) {
                        return true;
                    }else{
                        return false;
                    }
                }

                function denPublicacion($motivo,$idPublic){
                    $this->db->query("UPDATE publicacion set validada='-1' , motivoDenegacion=:motivo, fechaAutorizacion=NOW() where idPublic = :idPublicacion");
                    $this->db->bind(':idPublicacion', $idPublic);
                    $this->db->bind(':motivo', $motivo);
                    if ($this->db->execute()) {
                        return true;
                    }else{
                        return false;
                    }
                }
    }