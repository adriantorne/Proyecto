<?php

    function redireccionar($pagina){
        header('location:'.RUTA_URL.$pagina);
    }

    function formatoFecha($fechaIngles){
        return date("d/m/Y H:i:s", strtotime($fechaIngles));
    }


    function tienePrivilegios($rol_usuario, $rolesPermitidos){
        // si $rolesPermitidos es vacio, se tendran privilegios
        if (empty($rolesPermitidos) || in_array($rol_usuario, $rolesPermitidos)) {
            return true;
        }
    }

    function estarMatriculado($id_curso, $idCursos){
        // si $rolesPermitidos es vacio, se tendran privilegios
        foreach ($idCursos as $k) {
            //Pasamos los ids a un array de INT (SINO NO FUNCIONA XD)
            $ids=[$k->idCurso];
            if (empty($ids) || in_array($id_curso, $ids)) {
                return true;
            }
        }
    }

    function obtenerRol($roles){
        $id_rol=0;
        foreach($roles as $rol){
            
            if ($rol->id_rol==30) {
                $id_rol=100;
            }
            
            if ($rol->id_rol==20) {
                $id_rol=200;
            }
            if ($rol->id_rol==10) {
                $id_rol=300;
            }
             
        }
        return $id_rol;
    }