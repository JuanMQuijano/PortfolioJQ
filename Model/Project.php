<?php

namespace Model;

class Project extends ActiveRecord
{
    protected static $tabla = "projects";
    protected static $columnasDB = ["id", "nombre", "descripcion", "imagen", "enlace"];

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $enlace;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->enlace = $args['enlace'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Debes Ingresar Un Nombre';
        }
        if (!$this->descripcion) {
            self::$alertas['error'][] = 'Debes Ingresar Una Descripción';
        }
        if (!$this->imagen) {
            self::$alertas['error'][] = 'Debes Seleccionar Una Imagen';
        }
        if (!$this->enlace) {
            self::$alertas['error'][] = 'Debes Ingresar Un Enlace';
        }

        return self::$alertas;
    }
}
