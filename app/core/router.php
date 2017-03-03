<?php

/**
 * Class Router маршрутизатор
 */
class Router {

    private $_url;
    private $_controller = NULL;
    private $_defaultController;
    private $result = NULL;

    /**
     * @return string текущий адрес запроса
     */
    private static function getURI(){
        if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
            return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function __construct(){
        // Запускаем сессию
        Session::init();
    }

    public function setTemplate($template){
       Session::set('template',$template);
    }

    public function setController($name){
        $this->_defaultController = $name;
    }

    protected function _loadDefaultController(){
        $controllerName = ucfirst($this->_defaultController). 'Controller';
        require ROOT . '/app/controllers/'.$controllerName.'.php';
        $this->_controller = new $controllerName;
        $this->_controller->loadModel($this->_defaultController);
        $this->_controller->actionIndex();

    }

    protected function _loadExistingController(){
		//Подключаем файл контроллера
        $controllerName = ucfirst($this->_url[0]). 'Controller';
		$file =  ROOT . '/app/controllers/'.$controllerName.'.php';
		if(file_exists($file)){
			require $file;
		    //instatiate controller
			$this->_controller = new $controllerName;
		} else {
			$this->_error("File does not exist: ".$this->_url[0]);
			return false;
		}
	}

    protected function _callControllerMethod()
    {
        $length = count($this->_url);
        // Make sure the method we are calling exists
         if ($length > 1) {
             $action = 'action' . ucfirst($this->_url[1]);
             if (method_exists($this->_controller, $action)) {
                 //$param = ($this->_url[2] )? $this->_url[2] : "/";
                 $this->_controller->$action(@$this->_url[2] );
                 $this->result = true;
             } else {
                 $this->_error("Method does not exist: ".$this->_url[1]);
                 return false;
             }
         }
     }

    /**
     * Display an error page if nothing exists
     *
     * @return boolean
     */
     protected function _error($error) {
         require ROOT . '/app/core/errors.php';
         $this->_controller = new Errors($error);
         $this->_controller->index();
         die;
     }

    public function init(){
        /**
         * Router constructor подключает маршруты
         */
        $routesPath = ROOT . "/app/core/config/routes.php";
        $routes = include($routesPath);
        //получаем строку запроса
        $uri = self::getURI();
        // Проверить наличие такого запроса в routes.php
        foreach ($routes as $uriPattern => $path) {
            //Сравниваем uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)){
                // Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $this->_url = explode('/',$internalRoute);
                if(empty($this->_url[0])){
        			$this->_loadDefaultController();
        			return false;
        		}
                $this->_loadExistingController();
                $this->_callControllerMethod();

                if($this->result !== null)
                    break;
             }
        }
    }
}
