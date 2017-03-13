<?php

/**
 * Контроллер для работы с корзиной
 */

class CartController extends Controller{

   public function __construct(){
                 parent::__construct();
   }

    public function actionIndex (){

        //Получаем id пользователя из сессии
        $userId = User::checkLog();

        //Получаем всю информацию о пользователе из БД
        $user = User::getUserById($userId);

        $productsInCart = $_POST['val'];

        $res = Order::save($user['name'], 'userPhone', 'userText', $userId, $productsInCart);

    }


}
