<?php

// Desarrollo
function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Identifica ultimo servicio dentro de turno
function esUltimo(string $actual, string $proximo) : bool {
    if($actual !== $proximo){
        return true;
    } else {
        return false;
    }
}

// Verificar usuario autenticado
function isAuth() : void { 
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

// Verificar usuario Admin
function isAdmin() :void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}