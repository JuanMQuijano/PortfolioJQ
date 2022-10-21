<?php

namespace Model;

class User extends ActiveRecord
{
    protected static $tabla = "users";
    protected static $columnasDB = ["id", "correo", "contraseña"];

    public $id;
    public $correo;
    public $contraseña;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->correo = $args['correo'] ?? '';
        $this->contraseña = $args['contraseña'] ?? null;
    }

    public function validarUser()
    {
        if (!$this->correo) {
            self::$alertas['error'][] = 'Debes Ingresar Un Correo';
        }
        if (!$this->contraseña) {
            self::$alertas['error'][] = 'Debes Ingresar Una Contraseña';
        }

        return self::$alertas;
    }

    public function hashearPassword()
    {
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }

    public function verificarPassword($contraseña)
    {
        $resultado = password_verify($contraseña, $this->contraseña);

        return $resultado;
    }
}
