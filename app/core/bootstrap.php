<?php

class Bootstrap {

    public function __construct(){
        // Запускаем сессию
        session_start();
    }

	public function init(){
		require_once 'router.php';
		Router::start(); // запускаем маршрутизатор
	}

}
