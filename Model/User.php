<?php

namespace Model;

class User extends ActiveRecord
{
    protected static $tabla = "users";
    protected static $columnasDB = ["id", "correo", "password"];

    public $id;
    public $correo;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? null;
    }

    public function validarUser()
    {
        if (!$this->correo) {
            self::$alertas['error'][] = 'Debes Ingresar Un Correo';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'Debes Ingresar Una Contraseña';
        }

        return self::$alertas;
    }

    public function hashearPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verificarPassword($password)
    {
        $resultado = password_verify($password, $this->password);

        return $resultado;
    }
}
