<?php
 function isGuest(bool $value)
 {
     # code...
     return $value;
 }

function treeview($array, $id = 0)
{
   for ($i = 0; $i < count($array); $i++)
   {
      if($array[$i]['parent_id']==$id) {
         $stack[] = $array[$i]['name'];
        //  print_r($stack);
         treeview($array, $array[$i]['id']);
      }
   }
 }

if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

//Запускаем сессию
session_start();
define('ROOT', dirname(__FILE__));
require_once 'app/bootstrap.php';
