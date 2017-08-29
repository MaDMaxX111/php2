<?php
require_once('../config/config.php');

session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//http://site.ru/index/edit/5

$url_array = explode("/", $_SERVER['REQUEST_URI']);
//print_r($url_array);
//$page_name = "index";
//if($url_array[1] != "")
//	$page_name = $url_array[1];

$action = "";
if($url_array[count($url_array)] != "")
    $action = $url_array[];


$variables = prepareVariables($page_name, $action);

$isAjax = ($action == "") ? false : true;

echo renderPage($page_name, $variables, $isAjax);
