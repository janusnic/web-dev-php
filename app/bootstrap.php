<?php

// подключаем файлы ядра
// require_once 'core/model.php';
// require_once 'core/view.php';
// require_once 'core/controller.php';
// require_once 'helpers/session.php';
// require_once 'helpers/url.php';
// require_once 'core/router.php';
// require_once 'models/User.php';

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
