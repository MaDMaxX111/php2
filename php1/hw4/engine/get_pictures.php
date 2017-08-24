<?php
    function get_pictures(){

        $files = scandir(DIR_IMAGES);

        if ($files) {
            $results = [];
            unset($files[0],$files[1]);
//            проверяем есть ли папка кеш, если нет создаем
            if (!file_exists(DIR_IMAGES . '/cache')){
//                если нет создаем папку
                mkdir(DIR_IMAGES . '/cache', 0700);
//                делаем полный кеш папки попутно если файл не правильного разрешения удаляем его
                foreach ($files as $key=>$file){
                    if (!is_file(DIR_IMAGES . '/' . $file)){
                        unset($files[$key]);
                        continue;
                    }
                    $name = explode('.', $file);
//                    проверяем расширение файла                    
                    if (!in_array($name[1], ['jpg', 'gif', 'png'])){
                        unlink(DIR_IMAGES . '/' . $file);
                        unset($files[$key]);
                    } else {
//                        если файл правильный делаем уменьшенную копию
                        imageresize(DIR_IMAGES . '/cache/' . $file, DIR_IMAGES . '/' . $file, WIDTH_IMAGE);
                    }

                }
            }
//          проверяем есть ли кеши файлов, если нет то создаем и помещаем в результат
            foreach ($files as $key=>$file){
                // проверка расширения
                if (!is_file(DIR_IMAGES . '/' . $file)){
                    unset($files[$key]);
                    continue;
                }
                $name = explode('.', $file);
//                    проверяем расширение файла
                if (!in_array($name[1], ['jpg', 'gif', 'png'])){
                    echo print_r($name) . '<br>';
                    unlink(DIR_IMAGES . '/' . $file);
                    unset($files[$key]);
                } else {
//                        если файл правильный проверем есть ли в кеше он
                    if (!file_exists(DIR_IMAGES . '/cache/' . $file)) {
                        imageresize(DIR_IMAGES . '/cache/' . $file, DIR_IMAGES . '/' . $file, WIDTH_IMAGE);
                    }
                    
                    $results[] = [
                        'img'   => DIR_IMAGES . '/' . $file,
                        'thumb' => DIR_IMAGES . '/cache/' . $file
                    ];
                }
            }


        } else return false;

        return $results;
    }

    function imageresize($outfile,$infile,$neww=0, $quality=50) {

        $im = imagecreatefromjpeg($infile);
        $k = $neww/imagesx($im);
        if ($k > 1) $k =1;

        $w=intval(imagesx($im)*$k);
        $h=intval(imagesy($im)*$k);

        $im1=imagecreatetruecolor($w,$h);
        imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

        imagejpeg($im1,$outfile,$quality);
        imagedestroy($im);
        imagedestroy($im1);
    }
?>