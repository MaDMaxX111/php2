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
session_start();
// проверка авторизации сессии
$authUser = checkAuthUser();

?>

<?php


if (isset($_GET['file_id'])){

    if ($file = get_file($_GET['file_id']))
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
        <span>Количество комментарий: <?php echo $file['col_comments']; ?></span>
        <?php if ($_COOKIE['statistic'][$_GET['file_id']]) { ?>
        <br><span>Уважаемый <?php echo $_SESSION['user_name']; ?> Вы просматривали данное фото <?php echo $_COOKIE['statistic'][$_GET['file_id']];?> раз</span>
        <?php } ?>
        <div class="wrap_image">
            <img src="<?php echo DIR_IMAGES . '/' . $file['file']?>">
         </div>
    </div>
<?php if ($comments = get_comments($_GET['file_id'])) { ?>
    <div class="comments">
        <?php foreach ($comments as $comment) { ?>
            <div class="comment">
            <p class="text"><?php echo $comment['comment']?></p>
            <p class="date"><span>Дата добавления: </span><?php echo $comment['date_added']?></p>
            </div>
        <? } ?>
    </div>
<?php } ?>
<?php if ($authUser) { ?>
    <div>
        <form method="post" enctype="multipart/form-data" action="addcomment.php">
            <textarea rows="5" name="comment"></textarea>
            <input hidden name="file_id" value="<?=$_GET['file_id'][0];?>"/>
            <div>
                <button type="submit">Добавить комментарий</button>
            </div>
        </form>
    </div>
<?php } ?>
<?php } ?>

</body>
</html>
<?php

if ($_GET['file_id'] && $authUser)
{

    //        запись статистики просмотра в куки
    if (isset($_COOKIE['statistic'][$_GET['file_id']])){
        setcookie('statistic[' . $_GET['file_id'] . ']', $_COOKIE['statistic'][$_GET['file_id']]+1, time()+86400);
    } else {
        setcookie('statistic[' . $_GET['file_id'] . ']', 1, time()+86400);
    }

};

?>