<?php

/**
 * Class AboutController
 * Контроллер About страницы
 */
 class AboutController extends Controller {

         public function __construct(){
             parent::__construct();
         }

         public function actionIndex () {
             $data['title'] = 'About Page ';
             $this->_view->rendertemplate('header',$data);
             $this->_view->render('about/index',$data);
             $this->_view->rendertemplate('footer',$data);

         }

 }
