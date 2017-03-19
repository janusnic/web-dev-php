<?php

return array(
    //Регистрация
    'user/signup' => 'user/signup', //actionSignup в UserController

    //Вход
    'user/login' => 'user/login',

    'check' => 'user/check',

    //Выход
    'user/logout' => 'user/logout',

    //оформление заказа
    'cart' => 'cart/index',
    'cart/checkout' => 'cart/checkout',

    // profile
    //Личный кабинет
    'profile/orders' => 'profile/ordersList',
    'profile/edit' => 'profile/edit',
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

    //Админпанель
    'admin/orders/edit/([0-9]+)' => 'adminOrder/edit/$1',
    'admin/orders/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/orders/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/orders' => 'adminOrder/index',

    'admin/blog/edit/([0-9]+)' => 'adminBlog/edit/$1',
    'admin/blog/add' => 'adminBlog/add',
    'admin/blog/delete/([0-9]+)' => 'adminBlog/delete/$1',
    'admin/blog' => 'adminBlog/index',

    'blog/([a-zA-Z0-9_-]+)' => 'blog/view/$1',
    //'blog/([0-9]+)' => 'blog/view/$1',
    'comment' => 'comment/index',

    'blog' => 'blog/index',

    'admin' => 'admin/index',

    //Главаня страница
    'index.php' => 'index/index', //вызываем actionIndex в IndexController
    '' => 'index/index'  //вызываем actionIndex в IndexController
);
