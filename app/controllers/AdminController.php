<?php

/**
 * Class AdminController
 * Контроллер главной страницы
 */
class AdminController extends Controller {

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


    public function actionIndex () {
        //проверка доступа
        $this->checkAdmin();
        $data['title'] = 'Admin Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/index',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

}
