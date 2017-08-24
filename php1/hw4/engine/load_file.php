<?php
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
            $uploaddir = 'pictures/';
            $name = explode('.', $_FILES['new_file']['name']);
            $name[0] .= '-' . date(U);

            $destination  = $uploaddir.implode('.', $name);

            if (move_uploaded_file($_FILES['new_file']['tmp_name'],$destination)){
                return ['success' => 'Файл удачно загружен'];
            } else {
                return ['error' => 'Ошибка сохранения файла'];
            }
        } else {
            return ['error' => 'Ошибка загрузки файла'];
        }

    }
?>