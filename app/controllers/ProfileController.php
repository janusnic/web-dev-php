<?php

/**
 * Class ProfileController
 * Контроллер Profile страницы
 */
 class ProfileController extends Controller {

         public function __construct(){
             parent::__construct();
         }

         public function actionIndex () {
             $data['title'] = 'Welcome To ';
             $this->_view->rendertemplate('header',$data);
             $this->_view->render('profile/index',$data);
             $this->_view->rendertemplate('footer',$data);
         }
 }
