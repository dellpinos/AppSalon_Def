<?php

namespace Controllers;

use MVC\Router;
use Model\AdminTurno;


class AdminController {

    public static function index(Router $router) {
        // session_start();

        isAdmin();

        $fecha = $_GET['fecha'] ?? Date('Y-m-d');

        $fechas = explode('-', $fecha);
        
        if(!$fechas = checkdate($fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
        }


        // Consultar DB
        $query = "SELECT turnos.id, turnos.hora, CONCAT(usuarios.nombre, \" \" ,usuarios.apellido) AS cliente, ";
        $query .= " usuarios.email, usuarios.telefono, servicios.nombre AS servicio, servicios.precio ";
        $query .= " FROM turnos ";
        $query .= " LEFT OUTER JOIN usuarios ";
        $query .= " ON turnos.usuarioId=usuarios.id ";
        $query .= " LEFT OUTER JOIN turnosServicios ";
        $query .= " ON turnosServicios.turnoId=turnos.id ";
        $query .= " LEFT OUTER JOIN servicios ";
        $query .= " ON turnosServicios.servicioId=servicios.id ";
        $query .= " WHERE fecha = '{$fecha}' ;";


        $turnos = AdminTurno::SQL($query);


        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'turnos' => $turnos,
            'fecha' => $fecha
        ]);
    }

}

