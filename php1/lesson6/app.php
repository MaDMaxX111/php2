<?php

session_start();
setcookie("passwords", "qwerty", time() + 3600);


require_once('config/config.php');
require_once('engine/functions.php');

$url_array = explode("/", $_SERVER['REQUEST_URI']);

//Если не указан адрес страницы, то считаем что пользователь зашел на главную страницу
if($url_array[1] == "")
{
	$page_name = "index";
}
else
{
	$page_name = $url_array[1];
}

echo "<pre>";
//print_r($_REQUEST);
//print_r($url_array);
echo "</pre>";

$content['header'] = '../templates/header.php';
$content['footer'] = "../te/*`mplates/footer.php";
$content['navigation'] = "../templates/navigation.php";

//Получаем содержимое страницы, в зависимости от адреса перехода

foreach(prepareVariables($page_name) as $key=>$value)
{
	$content[$key] = $value;
}


include '../templates/bases.php';


?>
