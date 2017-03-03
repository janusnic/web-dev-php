<?php

/**
 * Class AdminController
 * Контроллер главной страницы
 */
class AdminController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function actionIndex () {
        $data['title'] = 'Admin Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/index',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

}
