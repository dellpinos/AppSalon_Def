<?php

namespace Controllers;

use MVC\Router;

class TurnoController {
    public static function index(Router $router){

    isAuth();

        $router->render('turno/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}