<?php
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/../src/img/');


function debuguear($contenido)
{
    echo "<pre>";
    var_dump($contenido);
    echo "<pre>";
    exit;
}

function isAuth()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['login'])) {
        header('Location: /login');
    }
}
