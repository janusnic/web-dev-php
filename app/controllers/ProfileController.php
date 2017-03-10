<?php
/**
 * Class ProfileController
 * Контроллер для работы с личным кабинетом
 */

 class ProfileController extends Controller {

         public function __construct(){
             parent::__construct();
         }
         /**
          * Основная страница личного кабинета
          *
          * @return bool
          */
         public function actionIndex () {

             //Получаем id пользователя из сессии
             $userId = User::checkLog();

             //Получаем всю информацию о пользователе из БД
             $user = User::getUserById($userId);

             $data['title'] = 'Личный кабинет ';
             $data['user'] = $user;
             $this->_view->rendertemplate('header',$data);
             $this->_view->render('profile/index',$data);
             $this->_view->rendertemplate('footer',$data);
         }

         /**
          * Редактирование информации
          *
          * @return bool
          */
         public function actionEdit (){

             //Получаем id пользователя из сессии
             $userId = User::checkLog();

             $res = false;

             if (isset($_POST) and (!empty($_POST))) {
                 $name = trim(strip_tags($_POST['name']));
                 $password = trim(strip_tags($_POST['password']));

                 //Флаг ошибок
                 $errors = false;

                 //Валидация полей
                 if (!User::checkName($name)) {
                     $errors[] = "Имя не может быть короче 2-х символов";
                 }

                 if (!User::checkPassword($password)) {
                     $errors[] = "Пароль не может быть короче 6-ти символов";
                 }

                 if ($errors == false) {
                     $res = User::edit($userId, $name, $password);
                 }
             }

             $data['title'] = 'Личный кабинет ';
             $data['res'] = $res;
             $data['errors'] = $errors;
             $this->_view->rendertemplate('header',$data);
             $this->_view->render('profile/edit',$data);
             $this->_view->rendertemplate('footer',$data);

         }

         /**
          * Просмотр истории заказов пользователя
          *
          * @return bool
          */
         public function actionOrdersList (){

             //Получаем id пользователя из сессии
             $userId = User::checkLog();

             $orders = Order::getOrdersListByUserId($userId);

             $data['title'] = 'Личный кабинет ';
             $data['orders'] = $orders;
             $this->_view->rendertemplate('header',$data);
             $this->_view->render('profile/orders',$data);
             $this->_view->rendertemplate('footer',$data);
         }
     }
