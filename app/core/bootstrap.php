<?php

class Bootstrap {

    private $_controller = NULL;

    public function __construct(){
        // Запускаем сессию
        Session::init();
    }

    public function setTemplate($template){
       Session::set('template',$template);
    }

	public function init(){
		require_once 'router.php';
		Router::start(); // запускаем маршрутизатор
	}

    /**
     * Display an error page if nothing exists
     *
     * @return boolean
     */
    protected function _error($error) {
        require 'core/error.php';
        $this->_controller = new Error($error);
        $this->_controller->index();
        die;
    }

}
