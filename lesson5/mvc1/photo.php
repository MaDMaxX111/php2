<?
  include "model/gallery.php";
  $img = photo($_GET["id"]);
  $title = "Просмотр фотографии";
  $content = "templates/content_photo.php";
  include "templates/main.php";
?>  
