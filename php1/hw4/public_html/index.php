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
include '../engine/load_file.php';
include '../engine/get_pictures.php';
?>
<div class="wrap_form">
<form enctype="multipart/form-data" action="index.php" method="post">
	<input type="file" name="new_file" value=""/>
    <input type="submit" name="load_file" value="Отправить файл"/>
    <input hidden type="text" name="redirect" value="<?echo $_SERVER['SCRIPT_NAME'];?>"/>
</form>
</div>

<?php

if (isset($_POST['load_file'])){

    $results = load_file();

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

$files = get_pictures();

if ($files) {
    ?>
    <div class="wrap clear_fix">
        <ul>
            <?php foreach ($files as $file) { ?>
            <li><a href="<?php echo $file['img']?>" target="_blank" style="background-image: url('<?php echo $file['thumb']?>');"></a></li>
            <?php } ?>
        </ul>
    </div>
<?php }
?>

</body>
</html>