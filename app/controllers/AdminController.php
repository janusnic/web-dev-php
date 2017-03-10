<?php

/**
 * Class AdminController
 * Контроллер главной страницы
 */
class AdminController extends Admin {

    public function __construct(){
        parent::__construct();
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
