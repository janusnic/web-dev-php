<?php

// подключаем файлы ядра

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

require_once 'helpers/url.php';
require_once 'core/bootstrap.php';
require_once 'models/User.php';


$app = new Bootstrap();
//$app->setTemplate('default');
$app->init();
