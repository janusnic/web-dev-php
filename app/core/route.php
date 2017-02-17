<?php

/**
 * @return string текущий адрес запроса
 */
function getURI(){
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

//получаем строку запроса
$uri = getURI();

$routesPath = ROOT . "/app/core/config/routes.php";
$routes = include($routesPath);

// Проверить наличие такого запроса в routes.php
foreach ($routes as $uriPattern => $path) {

    //Сравниваем uriPattern и $uri
    if(preg_match("~$uriPattern~", $uri)){

        // Получаем внутренний путь из внешнего согласно правилу
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

        // Определить контроллер, action, параметры
        $segments = explode('/', $internalRoute);

        $controllerName = array_shift($segments) . 'Controller';
        $controllerName = ucfirst($controllerName);

        $actionName = 'action' . ucfirst(array_shift($segments));

        $parameters = $segments;

        //Подключаем файл контроллера
        $controllerFile = ROOT . "/app/controllers/" . $controllerName . ".php";

        if(file_exists($controllerFile)){
            include_once($controllerFile);
            $result = true;
            }

        if($result !== null)
            break;
    }
}
