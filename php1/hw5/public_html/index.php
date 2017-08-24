<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Галлерея</title>
</head>
<body>
<?php
include '../config/config.php';
include '../engine/function.php';

?>
<div class="wrap_form">
<form enctype="multipart/form-data" action="index.php" method="post">
	<input type="file" name="new_file" value=""/>
    <input type="submit" name="load_file" value="Отправить файл"/>
    <input hidden type="text" name="redirect" value="<?echo $_SERVER['SCRIPT_NAME'];?>"/>
</form>
<!--    форма создания БД появится если нет файлов-->
<?php if (!@$files = get_pictures())  { ?>
<form enctype="multipart/form-data" action="index.php" method="post">
    <input type="submit" name="createdb" value="Создать базу"/>
    <input hidden type="text" name="redirect" value="<?echo $_SERVER['SCRIPT_NAME'];?>"/>
</form>
<?php } ?>

</div>

<?php


if (isset($_POST['load_file']) || isset($_POST['createdb'])){

    if ($_POST['load_file']) {

        $results = load_file();
    }

    if ($_POST['createdb']) {

        $results = create_db();
    }



    if (isset($results['error'])) {
        $message_type = 'error';
        $message      = $results['error'];
    } else {
        $message_type = 'success';
        $message      = $results['success'];
    }

    header('Location:' . $_POST['redirect'] . '?message_type=' . $message_type . '&message=' . $message);

}

if ($_GET['message']) {

        echo '<div class="' . $_GET['message_type']. '">' . $_GET['message'] . '</div>';

};

if ($files) {
    ?>
    <div class="wrap clear_fix">
        <ul>
            <?php foreach ($files as $file) { ?>
            <li>
                <a href="view.php?file_id=<?php echo $file['id']?>" target="_blank" style="background-image: url('<?php echo DIR_CACHE .'/'. $file['file']?>');"></a>
                <div><span><?php echo $file['date']?></span><br><span> Просмотров: <?php echo $file['review']?></span></div>
            </li>
            <?php } ?>
        </ul>
    </div>
<?php }
?>

</body>
</html>