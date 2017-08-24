<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Просмотр Фото</title>
</head>
<body>
<?php
include '../config/config.php';
include '../engine/function.php';
?>

<?php


if (isset($_GET['file_id'])){

    if ($file = get_file($_GET['file_id'])[0])
    {
        update_review($_GET['file_id'], $file['review']);

    };

}

if ($file) {
    ?>
    <div class="wrap img">
        <span>Дата добавления: <?php echo $file['date']; ?></span><br>
        <span>Размер:  <?php echo $file['size']; ?></span><br>
        <span>Количество просмотров:  <?php echo $file['review']; ?></span><br>
        <img src="<?php echo DIR_IMAGES . '/' . $file['file']?>">
    </div>
<?php }
?>

</body>
</html>