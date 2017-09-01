<a href="index.php">Таблица</a> | Список
<br><br>
<?
  foreach($photos as $img){?>
      <a href="photo.php?id=<?=$img[id]?>">
            <img src=<?=$img["id"].".".$img["type"]?> height="200">
      </a>
  <?}
?>