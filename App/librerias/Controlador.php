<?php

//Controlador principal de todos los contrladores
//Se encarga de cargar los modelos y las vistas

class Controlador
{

    protected $datos = ["rolesPermitidos" => [1, 3]];

    //cargar modelo
    public function modelo($modelo)
    {
        require_once '../App/modelos/' . $modelo . '.php';
        return new $modelo;
    }

    //cargar vista

    public function vista($vista, $datos = [])
    {
        //comprobamos si existe el archivo
        if (file_exists('../App/vistas/' . $vista . '.php')) {
            require_once '../App/vistas/' . $vista . '.php';
        } else {
            die("La vista no existe");
        }
    }
    public function vistaApi($datos)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($datos);
        exit();
    }
}
