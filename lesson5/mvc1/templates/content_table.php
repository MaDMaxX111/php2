Таблица | <a href="index.php?view=list">Список</a>
<br><br>
<table>
  <tr>
  <?
    $i=1;
    foreach($photos as $img){
    ?>
    <td>
        <a href="photo.php?id=<?=$img[id]?>">
            <img src=<?=$img["id"].".".$img["type"]?> height="200">
        </a>
    </td>
    <?
      if(!($i%3)) 
        echo "</tr><tr>";  
    $i++;  
    }?>
    </tr>
</table>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="photo">
    <input type="submit" value="Загрузить">
</form>