<?php

// подключаем файлы ядра
 function autoloadsystem($class) {
    $filename = ROOT . "/app/core/" . strtolower($class) . ".php";
    if(file_exists($filename)){
       require $filename;
    }
    $filename = ROOT . "/app/helpers/" . strtolower($class) . ".php";
    if(file_exists($filename)){
       require $filename;
    }
    $filename = ROOT . "/app/models/" . strtolower($class) . ".php";
    if(file_exists($filename)){
       require $filename;
    }
 }
 spl_autoload_register("autoloadsystem");

$app = new Router();
$app->setTemplate('default');
$app->setController('index');
$app->init();
