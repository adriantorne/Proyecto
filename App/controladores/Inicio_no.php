<?php

class Inicio_no extends Controlador
{
    public function __construct()
    {

        $this->publicacionModelo = $this->modelo('PublicacionModelo');
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = $_POST;
            print_r($datos);
        } else {
            $getmac = `getmac`;

            // Busca la dirección MAC de la tarjeta de red local y extrae la dirección MAC asociada
            if (preg_match('/([\da-fA-F]{2}[-:]){5}[\da-fA-F]{2}/', $getmac, $matches)) {
                $mac = $matches[0];
            } else {
                // Si no se encuentra la dirección MAC, muestra un mensaje de error
                echo 'No se pudo encontrar la dirección MAC del cliente.';
            }
            $date = date('Y-m-d');

            $this->datos['publicacion'] = $this->publicacionModelo->getPublicacionPantallaCarrousel($mac, $date);
            $this->vista("inicio_no_logueado", $this->datos);
        }
    }
}
