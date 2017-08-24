<?php
function create_db() {

	$db = @mysqli_connect(HOST, USER, PASS);
	if (!$db){
		return ['error' => 'Проверьте настройки подключения к БД'];
	}

	if (mysqli_select_db($db, DB)){

		mysqli_close($db);
		return ['error' => 'БД уже существует'];
	}

	$sql = 'CREATE DATABASE IF NOT EXISTS '. DB;

	mysqli_query($db, $sql);
	
	mysqli_select_db($db, DB);
	
	$sql = "CREATE TABLE `image` (
				`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  				`file` varchar(255) CHARACTER SET utf8 NOT NULL,
  				`size` int(11) NOT NULL,
                `date` datetime NOT NULL,
                `review` int(11) NOT NULL);";

	$result = mysqli_query($db, $sql);
	
	mysqli_close($db);

	if ($result){
		return ['success' => 'Поздравляем БД создана'];
	} else {
		return ['error' => 'Что-то пошло не так'];
	}

}

function load_file(){

	if (!$_FILES['new_file']['error']){

		//проверка размера файла
		if ($_FILES['new_file']['size'] > MAX_SIZE_UPLOAD_FILES){
			return ['error' => 'Превышен максимальный размер файла'];
		}

		$types = ['image/gif', 'image/png', 'image/jpeg'];

		if (!in_array($_FILES['new_file']['type'], $types)) {
			return ['error' => 'Не верный формат файла'];
		}

		date_default_timezone_set('UTC');
		$uploaddir = DIR_IMAGES . '/';
		$name = explode('.', $_FILES['new_file']['name']);
		$name[0] .= '-' . date(U);
        $new_name = implode('.', $name);
		$destination  = $uploaddir . $new_name;
        $size = (int) $_FILES['new_file']['size'];

		if (move_uploaded_file($_FILES['new_file']['tmp_name'],$destination)){

            // делаем миниатюру
            imageresize(DIR_CACHE . '/' . $new_name, DIR_IMAGES . '/' . $new_name, WIDTH_IMAGE);

            //вставляем в БД запись о нашем изображении
			$sql = "INSERT INTO image (file, size, date, review) VALUES ('" . $new_name . "', ". $size .", now(), 0)";
            $id = sql_insert($sql);

            if (!$id) 			return ['error' => 'Ошибка записи в БД'];

            return ['success' => 'Файл удачно загружен'];
		} else {
			return ['error' => 'Ошибка сохранения файла'];
		}
	} else {
		return ['error' => 'Ошибка загрузки файла'];
	}

}

function get_pictures(){

    $sql = "SELECT id, file, date, review, size FROM `image` ORDER BY `review` DESC";

    if ($files = sql_query($sql)) {

        return $files;
    };

    return false;
}

function get_file($id){

    $sql = "SELECT file, date, review, size FROM `image` WHERE  id=" . (int) $id;

    if ($file = sql_query($sql)) {

        $sql = "SELECT COUNT(image_id) as col_comments FROM `comments` WHERE image_id=" . (int) $id;
        $file = array_merge($file[0], sql_query($sql)[0]);

        return $file;
    };

    return false;
}

function get_comments($id){

    $sql = "SELECT id, comment, date_added FROM `comments` WHERE image_id = " . (int) $id. " ORDER BY id ASC";

    if ($comments = sql_query($sql)) {

        return $comments;
    };

    return false;
}

function update_review($id, $review){

    $sql = "UPDATE `image` SET `review` = " . ++$review . " WHERE `id` =" . $id;

    if (sql_insert($sql)) {

        return true;

    };

    return false;
}

function getConnection(){
    $db = mysqli_connect(HOST, USER, PASS, DB);
    mysqli_query($db, "SET NAMES utf8");
    return $db;
}

//функция отправки запросов в БД получение и обработка результатов
function sql_query($sql, $db = 0)
{

    if (!$db) {
        $db = mysqli_connect(HOST, USER, PASS, DB);
    }

	$result = mysqli_query($db, $sql);

    if (!$result) return false;

    $array_result = array();
    while ($row = mysqli_fetch_assoc($result)) {
			$array_result[] = $row;
	}

	mysqli_close($db);

	return $array_result;

}

//функция вставки данных в БД
function sql_insert($sql, $db = 0)
{

    if (!$db) {
        $db = mysqli_connect(HOST, USER, PASS, DB);
    }

    mysqli_query($db, $sql);

    $result = mysqli_insert_id($db);

    mysqli_close($db);

    return $result;

}

//функция уменьшения картинки
function imageresize($outfile,$infile,$neww=0, $quality=50) {

	$im = imagecreatefromjpeg($infile);
	$k = $neww/imagesx($im);
	if ($k > 1) $k =1;

	$w=intval(imagesx($im)*$k);
	$h=intval(imagesy($im)*$k);

	$im1=imagecreatetruecolor($w,$h);
	imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

	imagejpeg($im1, $outfile, $quality);
	imagedestroy($im);
	imagedestroy($im1);
    return true;
}

//добавление комментариев
function addcomment($comment, $file_id){

    $db = mysqli_connect(HOST, USER, PASS, DB);
    $comment = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($comment)));

    $sql = "INSERT INTO comments (image_id, comment) VALUES (" . (int) $file_id . ", '".  $comment ."')";

    mysqli_query($db, $sql);

    return;
};

//проверка формы регистрации
function validate_reg_form($login, $name, $password1, $password2){

    $error = [];
//    проверка логина
    if (mb_strlen($login, 'utf-8') < 3 || mb_strlen($login, 'utf-8') > 64){
        $error['error_login'] = 'Логин должен быть от 3 до 64 символов';
    }

    $db = getConnection();
    $login = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($login)));

    $sql = "SELECT id_user FROM user WHERE user_login ='" . $login . "'";
    
    if (sql_query($sql, $db)) {
        $error['error_login'] = 'Такой логин существует';
    };

    //    проверка имени
    if (mb_strlen($name, 'utf-8') < 3 || mb_strlen($name, 'utf-8') > 64){
        $error['error_name'] = 'Имя должно быть от 3 до 64 символов';
    }

    // проверка паролей
    if (mb_strlen($password1, 'utf-8') < 3 || mb_strlen($password1, 'utf-8') > 64){
        $error['error_password'] = 'Пароль должен быть от 3 до 64 символов';
    }

    if ($password1 != $password2){
        $error['error_password'] = 'Введенные пароли не совпадают';
    }

    return $error;
}

//регистрация пользователя
function registration_user($login, $name, $password){
    $db = getConnection();

    $login = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($login)));
    $name = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($name)));
    $password = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($login)));

    $sql = "INSERT INTO user (user_name, user_login, user_password) VALUES ('" . $name . "', '" . $login . "', '" . $password . "')";

    if (sql_insert($sql, $db)){

        session_start();

        return verify_user($login, $password);
    };

    return false;
}

// верификация пользователя
function verify_user($login, $password, $remember = false)
{
    $db = getConnection();

    $login = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($login)));
    $password = mysqli_real_escape_string($db,(string)htmlspecialchars(strip_tags($password)));

    $sql = "SELECT id_user, user_name FROM user where user_login='". $login . "' AND user_password='". $password . "'";

    $authUser = 0;

    if ($result = sql_query($sql, $db)){

        $authUser = 1;

        $_SESSION['login']    = $login;
        $_SESSION['password'] = $password;
        $_SESSION['user_name'] = $result[0]['user_name'];

    }

    if($remember)
    {
        setcookie('login', $login, time()+86400);
        setcookie('password', $password, time()+86400);
    } else {
        setcookie('login', ' ', time() - 86400);
        setcookie('password', ' ', time() - 86400);
    }

    return $authUser;
}

function exit_user(){

    session_unset();
    return false;

}

// авторизация при помощи Cookies
function verify_user_by_cookies(){

    if (isset($_COOKIE['login']) && isset($_COOKIE['password'])){
        return verify_user($_COOKIE['login'], $_COOKIE['password'], true);
    }

    return false;
}

function checkAuthUser() {

    $authUser = false;

    // проверка данных в сессии
    if (isset($_SESSION['login']) && isset($_SESSION['password'])){
        $authUser = true;
    }
    // попытка авторизации при помощи cookies
    if (!$authUser) {
        $authUser = verify_user_by_cookies();
    }

    return $authUser;
}


?>