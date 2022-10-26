<?php

namespace Controller;

use Model\User;
use MVC\Router;
use Model\Project;
use Model\UserMessage;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController
{
    public static function Index(Router $router)
    {
        isAuth();

        $alertas = [];

        $userMessages = UserMessage::all();

        $router->render('/admin/index', [
            'enviado' => '',
            'alertas' => $alertas,
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
                    $valido = $resultado->verificarPassword($user->password);

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

    public static function Mensaje(Router $router)
    {
        isAuth();

        $id = $_GET['id'];
      
        $userMessage = UserMessage::find($id);

        $router->render('/admin/mensaje', [
            'alertas' => [],
            'enviado' => '',
            'admin' => true,
            'userMessage' => $userMessage
        ]);
    }

    public static function ProyectosIndex(Router $router)
    {
        isAuth();

        $projects = Project::all();

        $router->render('/admin/proyectos/index', [
            'alertas' => [],
            'admin' => true,
            'enviado' => '',
            'projects' => $projects

        ]);
    }

    public static function ProyectoCrear(Router $router)
    {
        isAuth();

        $alertas = [];
        $project = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project = new Project($_POST);
            //Generamos un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";

            //Setear la imagen
            if ($_FILES['imagen']['tmp_name']) {
                //Realiza un resize a la imagen con intervention
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
                $project->setImagen($nombreImagen);
            }

            $alertas = $project->validar();

            if (empty($alertas)) {
                //Si una carpeta existe o no
                if (!is_dir(CARPETA_IMAGENES)) {
                    //Si no existe, crearla
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);

                $resultado = $project->guardar();

                if ($resultado) {
                    header('Location: /admin/proyectos');
                }
            }
        }

        $alertas = Project::getAlertas();
        $router->render('/admin/proyectos/crear', [
            'alertas' => $alertas,
            'admin' => true,
            'enviado' => ''
        ]);
    }
}
