<?php
if (isset($_POST['comment'])){
    include '../engine/function.php';
    include '../config/config.php';
    addcomment($_POST['comment'], $_POST['file_id'][0]);
}
header('Location:' . $_SERVER['HTTP_REFERER']);

?>