<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        
        // Proteger Rutas
        session_start();

        $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD']; 
        

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {
            call_user_func($fn, $this);
        } else {
            echo "Ruta no válida";
        }
    }

    public function render($view, $datos = [])
    {
        // Paso los datos
        foreach ($datos as $key => $value) {
            $$key = $value;

        ob_start(); // Almacenamiento en memoria durante un momento

        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
        }
    }    
}
