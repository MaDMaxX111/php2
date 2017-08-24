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

    $sql = "SELECT id, file, date, review, size FROM `image` ORDER BY `review` ASC";

    if ($files = sql_query($sql)) {

        return $files;
    };

    return false;
}

function get_file($id){

    $sql = "SELECT file, date, review, size FROM `image` WHERE  id=" . (int) $id;

    if ($file = sql_query($sql)) {

        return $file;
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

//функция отправки запросов в БД получение и обработка результатов
function sql_query($sql)
{
	$db = mysqli_connect(HOST, USER, PASS, DB);

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
function sql_insert($sql)
{

    $db = mysqli_connect(HOST, USER, PASS, DB);

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
?>