<?

//Функция для загрузки фото

function add_photo($file){
    if(move_uploaded_file($file["tmp_name"],$file["name"]))
        echo "Файл успешно загружен";
    else
        echo "Файл не загружен!";
}

//Функция возвращает массив с фото

function gallery(){
    $arr = array(
                 array("id"=>1,"type"=>"jpg"),array("id"=>2,"type"=>"jpg"),
                 array("id"=>3,"type"=>"jpg"),array("id"=>4,"type"=>"jpg"),
                 array("id"=>5,"type"=>"jpg")
           );
    return $arr; 
}

function photo($id){
   return array("id"=>$id,"type"=>"jpg");   
}

?>