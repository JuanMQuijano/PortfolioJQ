<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'funciones.php';
require 'database.php';

//Conexion a BD
use Model\ActiveRecord;
ActiveRecord::setDB($db);
