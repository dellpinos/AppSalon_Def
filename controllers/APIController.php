<?php

namespace Controllers;

use Model\Servicio;
use Model\Turno;
use Model\TurnoServicio;

class APIController {
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);

    }
    public static function guardar(){

        // Almacena el Turno y devuelve un bool y el id del nuevo registro
        $turno = new Turno($_POST);
        $resultado = $turno->guardar();
        $id = $resultado['id'];

        // Almacena el turno y los servicios
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio) {
            $args = [
                'turnoId' => $id,
                'servicioId' => $idServicio
            ];
            $tunoServicio = new TurnoServicio($args);
            $tunoServicio->guardar();
        }
        // Retorna una respuesta
       echo json_encode(['resultado' => $resultado]);
        
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];            
            $turno = Turno::find($id);
            $turno->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}