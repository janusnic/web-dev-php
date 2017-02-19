<?php

return array(
    //Регистрация
    'user/signup' => 'user/signup', //actionSignup в UserController

    //Вход
    'user/login' => 'user/login',

    //Выход
    'user/logout' => 'user/logout',
    // profile
    'profile' => 'profile/index',

    // about
    'about' => 'about/index',

    //Главаня страница
    'index.php' => 'index/index', //вызываем actionIndex в IndexController
    '' => 'index/index'  //вызываем actionIndex в IndexController
);
