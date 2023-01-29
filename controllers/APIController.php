<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();

        echo json_encode($servicios);
    }

    public static function guardar(){

        //Almacena la cita y devuelve el ID
        //Crear variable
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        
        $id = $resultado['id'];

        //Almacena la cita y el Servicio

        //Almacena los servicios con el Id de la cita
        $idServicios = explode(",", $_POST['servicios'] );

        foreach($idServicios as $idServicio){
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }
            
        echo json_encode(['resultado' => $resultado]);
    }

    //Crear metodo eliminar
    public static function eliminar ()
    {
        //Para asegurarnos que solo se ejecute cuando este en un metodo POST se usa REQUEST_METHOD
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);   
        }
    }
}

