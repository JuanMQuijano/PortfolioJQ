<?php

namespace Controller;

use Model\UserMessage;
use MVC\Router;

class IndexController
{

    public static function Index(Router $router)
    {
        $alertas = [];
        $enviado = 0;
        $userMessage = new UserMessage();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userMessage = new UserMessage($_POST);
            $alertas = $userMessage->validarUserMessage();
            if (empty($alertas)) {
                $resultado = $userMessage->guardar();

                if ($resultado) {
                    $enviado = 1;
                }
            }
        }

        $alertas = UserMessage::getAlertas();
        $router->render('/index', [
            'alertas' => $alertas,
            'enviado' => $enviado,
            'admin' => false,
            'userMessage' => $userMessage
        ]);
    }
}
