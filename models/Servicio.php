<?php

namespace Model;

class Servicio extends ActiveRecord
{
    // Base dee datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->precio) {
            self::$alertas['error'][] = 'El precio es obligatorio';
        }
        if (!is_numeric($this->precio) || strlen($this->precio) > 3) { // Agregado para que no supere el DECIMAL 5,2 de la DB
            self::$alertas['error'][] = 'El precio debe ser un número válido con un máximo de 3 caracteres';
        } 

        return self::$alertas;
    }
}

