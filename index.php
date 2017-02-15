<?php
// function isGuest(bool $value=false)
// {
//     # code...
//     return false||$value;
// }

$categories = [
    ['id'=>1, 'name'=>'Computer', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>2, 'name'=>'Laptops', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>3, 'name'=>'Tablets', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>4, 'name'=>'Monitors', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>5, 'name'=>'Printers', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>6, 'name'=>'Scanners', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>7, 'name'=>'Phones', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>8, 'name'=>'iPhone', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>9, 'name'=>'Speakers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>10, 'name'=>'Subwoofers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>11, 'name'=>'Amplifiers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>12, 'name'=>'Players', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>13, 'name'=>'iPods', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>14, 'name'=>'TVs', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>15, 'name'=>'Clothes', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>16, 'name'=>'Jumpers', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>17, 'name'=>'Cardigans', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>18, 'name'=>'Clothes', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
];

function treeview($array, $id = 0)
{

   for ($i = 0; $i < count($array); $i++)
   {

      if($array[$i]['parent_id']==$id) {

         echo $array[$i]['id'].' '.$array[$i]['parent_id'].' '.$array[$i]['name'].'<br />';

         treeview($array, $array[$i]['id']);

      }
   }
}

//treeview($categories);

if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');
// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

//Запускаем сессию
session_start();
// Поключение файлов системы
//define('ROOT', dirname(__FILE__));
require_once(dirname(__FILE__) . '/config/config.php');
require_once(ROOT . '/views/index/index.php');
