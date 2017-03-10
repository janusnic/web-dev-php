<?php

class Admin extends Controller {

	public function __construct(){
        parent::__construct();
    }


	/**
     * Проверяет, является ли пользователь администратором
     *
     * @return bool
     */
    public function checkAdmin (){
        //Если авторизован - получаем id пользователя
        $userId = User::checkLog();

        //Вытаскиваем информацию о пользователе
        $user  = User::getUserById($userId);

        //Проверяем роль пользователя
        if($user['role'] == 'admin'){
            return true;
        }else{
            die ("У вас нет прав доступа в этот раздел! Уходите..");
        }
    }
}
