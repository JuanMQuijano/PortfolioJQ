<?php

namespace Model;

class UserMessage extends ActiveRecord
{
    protected static $tabla = "usermessages";
    protected static $columnasDB = [
        "id", "nombre", "apellido",
        "contacto", "email", "mensaje", "telefono", "fecha", "hora"
    ];

    public $id;
    public $nombre;
    public $apellido;
    public $contacto;
    public $email;
    public $mensaje;
    public $telefono;
    public $fecha;
    public $hora;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->fecha = $args['fecha'] ?? date('Y-m-d');
        $this->hora = $args['hora'] ?? '';
    }

    public function validarUserMessage()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Debes Ingresar Un Nombre';
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = 'Debes Ingresar Un Apellido';
        }
        if (!$this->contacto) {
            self::$alertas['error'][] = 'Debes Seleccionar Una Opción de Contacto';
        }

        if ($this->contacto === 'Email') {
            if (!$this->email) {
                self::$alertas['error'][] = 'Debes Ingresar Un E-mail';
            }
            if (!$this->mensaje) {
                self::$alertas['error'][] = 'Debes Ingresar Un Mensaje';
            }
        }

        if ($this->contacto === 'Telefono') {
            if (!$this->telefono) {
                self::$alertas['error'][] = 'Debes Ingresar Un Teléfono';
            }

            if (!$this->fecha) {
                self::$alertas['error'][] = 'Debes Seleccionar Una Fecha';
            }

            if (!$this->hora) {
                self::$alertas['error'][] = 'Debes Seleccionar Una Hora';
            }
        }

        return self::$alertas;
    }
}
