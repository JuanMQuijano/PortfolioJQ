<?php

namespace Controller;

use Model\User;
use Model\UserMessage;
use MVC\Router;

class AdminController
{
    public static function Index(Router $router)
    {
        isAuth();

        $userMessages = UserMessage::all();

        $router->render('/admin/index', [
            'enviado' => '',
            'admin' => true,
            'userMessages' => $userMessages
        ]);
    }

    public static function Login(Router $router)
    {
        $auth = $_SESSION['login'] ?? '';

        if ($auth) {
            header('Location: /admin');
        }

        $alertas = [];
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($_POST);

            $alertas = $user->validarUser();

            if (empty($alertas)) {

                $resultado = User::where('correo', $user->correo);

                if ($resultado) {
                    $valido = $resultado->verificarPassword($user->contraseña);

                    if ($valido) {
                        session_start();

                        $_SESSION['login'] = true;

                        header('Location: /admin');
                    } else {
                        $alertas = User::setAlerta('error', 'Contraseña Incorrecta');
                    }
                } else {
                    $alertas = User::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('/login', [
            'alertas' => $alertas,
            'enviado' => '',
            'admin' => '',
            'user' => $user
        ]);
    }

    public static function Register(Router $router)
    {

        $auth = $_SESSION['login'] ?? '';

        if ($auth) {
            header('Location: /admin');
        }

        $alertas = [];
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sincronizar($_POST);
            $alertas = $user->validarUser();

            if (empty($alertas)) {
                $correoExiste = User::where('correo', $user->correo);

                if (!$correoExiste) {
                    $user->hashearPassword();
                    $resultado = $user->guardar();

                    if ($resultado) {
                        session_start();

                        $_SESSION['login'] = true;

                        header('Location: /admin');
                    }
                } else {
                    $alertas = User::setAlerta('error', 'Usuario Ya Existe');
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('/register', [
            'enviado' => '',
            'admin' => '',
            'alertas' => $alertas,
            'user' => $user
        ]);
    }

    public static function Logout()
    {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}
