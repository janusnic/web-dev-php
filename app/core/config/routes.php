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

    //Каталог
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',

    'admin/product/edit/([0-9]+)' => 'adminProduct/edit/$1',
    'admin/product/add' => 'adminProduct/add',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/category/edit/([0-9]+)' => 'adminCategory/edit/$1',
    'admin/category/add' => 'adminCategory/add',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin' => 'admin/index',

    //Главаня страница
    'index.php' => 'index/index', //вызываем actionIndex в IndexController
    '' => 'index/index'  //вызываем actionIndex в IndexController
);
