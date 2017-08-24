<?php
function pages($page)
{


}

function verify_user($username, $password)
{
	//Проверим имеется ли пользователь в базе
	return authWithCredentials($username, $password);
}

function exit_user()
{
	session_unset();
    var_dump($_SESSION());
}


/**
 * авторизация через логин и пароль
 */
function authWithCredentials($username, $password)
{
	$link = getConnection();
	$sql = "select id_user, login, pass FROM users WHERE login = '". mysqli_real_escape_string($link,$username) ."'";
	$user_date = getRowResult($sql, $link);
	
	$isAuth = false;
	
	if ($user_date)
	{
		if ($password == $user_date['pass'])
		{
			$isAuth = true;
			$_SESSION['user'] = $username;
			$_SESSION['pass'] = $password;
		}
	}
	
	//Стоит галочка, запомнить пользователя на сутки
	if(isset($_POST['rememberme']) && $_POST['rememberme'] == 'on')
	{
		setcookie('user',$user_date['login'], time()+86400);
		setcookie('pass',$user_date['pass'], time()+86400);
		setcookie('id_user',$user_date['id_user'], time()+86400);
	}
				 
	return $isAuth;
}



/**
*Блок проверки факта авторизации пользователя при помощи сессии
*/
function checkAuthWithSession($username)
{
	$link = getConnection();
	$sql = "select id_user, login, pass from users where login = '" . mysqli_real_escape_string($link,$username) . "'";
	$user_data = getRowResult($sql, $link);
	
	$isAuth = 0;
	
	if ($user_data)
	{
		$isAuth = 1;
	}
	else
	{
		session_unset();
		$isAuth = 0;
	}
	
	
}


// блок функций авторизации
/**
 * валидация пользовательского куки
 * @return bool
 */
function checkAuthWithCookie()
{
	$isAuth = 0;
	
	
	if (isset($_COOKIE['id_user']) && isset($_COOKIE['pass']))
	{
		$link = getConnection();
		$sql = "select id_user, login, pass FROM  users WHERE id_user = '". mysqli_real_escape_string($link,$sql) ."'";
		$user_data = getRowResult($sql, $link);
		
		//Сравнить данные из БД с данными которые хранятся в куках
		if (($user_data['pass'] == $_COOKIE['pass']) || ($user_data['id_user'] == $_COOKIE['id_user']) )
		{
			setcookie("user", $user_data['login'], time() + 86400);
			setcookie("pass", $user_data['pass'], time()+86400);
            setcookie("id_user", $user_data['id_user'], time() + 86400);
			$isAuth = 1;
		}
		else
		{
			setcookie("user", "", time() - 86400);
			setcookie("pass", "", time() - 86400);
			setcookie("id_user", "", time() - 3600 * 24 * 30 *12);
		}
	}
	return $isAuth; 
}

?>