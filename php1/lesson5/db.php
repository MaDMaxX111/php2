<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
require_once('config.php');
require_once('function.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Base.css">
<title>Документ без названия</title>
</head>

<body>
    <form action="?" method="post">
        Текст сообщения <input type="text" name="MyText" value="" />
        <input type="submit" name="MySubmit" value="Отправить"/>
        <input type="submit" name="MySubmitDelete" value="Удалить все записи"/>
    </form>
    

    
<?php
//Обрабатываем нажатие кнопки Удалить все записи
if (!empty($_POST['MySubmitDelete']))
{
	$sql = 'delete from news';
	executeQuery($sql);
}




//Обрабатываем нажатие кнопки Отправить
if (!empty($_POST['MySubmit']))
{
	$sql = "insert INTO `news` (`message`, `date`, `user`) values ('".$_POST['MyText']."', now(), 'user1')"; //Формируем запрос на добавление записи
	executeQuery($sql); //Вызываем функцию добавление записи
}

$sql = "select * from `news`"; //Формируем запрос на выборку всех данных
$mynews = getResult($sql); //Вызываем функцию на получение данных из БД


//Цикл вывода данных
for ($i=0; $i<count($mynews);$i++)
{
	echo " 
	<div id=\"news\">
	<p>Новость№". $i." Дата:". $mynews[$i]['data']. " - ". $mynews[$i]['message']. " <br> Пользователь:". $mynews[$i]['user']."
	</p>
	</div>
	";
}


?>


</body>
</html>