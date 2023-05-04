<?php

namespace Controllers;

use MVC\Router;

class TurnoController {
    public static function index(Router $router){

//   session_start(); <<<<<<< Ya tengo iniciada la sesion, esto provoca un error Notice

    isAuth();

        $router->render('turno/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}