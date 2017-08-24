<?php
session_start();
require_once('cnfg/config.php');
require_once('eng/db.php');
require_once('eng/function.php');


if (isset($_POST['submit']))
{
	verify_user($_POST['login'], $_POST['password']);
}

if (isset($_POST['exit']))
{
    exit_user();
}

if (!checkAuthWithSession($_SESSION['user']))
{
//	checkAuthWithCookie();
}


?>

<?php
 
 
if (empty($_SESSION['user']) or empty($_SESSION['pass']))
	{
		echo
		'<form action="/" method="post">
        <p>Логин: <input type="text" name="login" /></p>
        <p>Пароль: <input type="password" name="password" /></p>
        <p>Запомнить:<input type="checkbox" name="rememberme"/><input type="submit" value="Войти" name="submit"/></p>
		</form>';
     }
else 
	{
        echo ' 
		<form action="/" method="post">
        <p>Вы авторизованы: '. $_SESSION['user_name'] .'<br>
        Ваш логин: '. $_SESSION['user'] .'</p>
        <p><input type="submit" value="Выйти" name="exit"/></p>
		</form>';
	};

 ?>

