<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Галлерея</title>
</head>
<body>
<?php
include '../config/config.php';
include '../engine/function.php';
session_start();

$authUser = checkAuthUser();

//Проверка ввода логина

if (isset($_POST['enter'])){

    $authUser = verify_user($_POST['name'], $_POST['password'], $_POST['remember']);

}

//выход пользователя
if (isset($_POST['exit']))
{
    $authUser = exit_user();
}

?>
<div class="row">
<div class="wrap_form col-md-6">
<form enctype="multipart/form-data" action="index.php" method="post">
	<input class="btn btn-default" type="file" name="new_file" value=""/>
    <input class="btn btn-default" type="submit" name="load_file" value="Отправить файл"/>
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
<?php if (!$authUser) { ?>
<!--    Форма авторизации пользователя-->
<div class="col-md-6">
<form method="post" action="?" enctype="multipart/form-data">
    <div class="form-group">
        <label for="imputName">Имя пользователя</label>
        <input type="text" class="form-control" id="imputName" name="name" placeholder="Введите имя">
    </div>
    <div class="form-group">
        <label for="inputPassword">Пароль:</label>
        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Введите пароль">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember">Запомнить
        </label>
    </div>
    <button type="submit" name="enter" class="btn btn-default">Войти</button>
    <a href="registration.php" class="btn btn-default">Зарегистрироваться</a>
</form>
</div>
<!--    Форма авторизации пользователя-->
<?php } else { ?>
    <label>Welcome <?php echo $_SESSION['user_name'];?></label>
    <!--    кнопка выхода-->
    <div class="col-md-6">
        <form method="post" action="?" enctype="multipart/form-data">
            <button type="submit" name="exit" class="btn btn-default">Выйти</button>
        </form>
    </div>
    <!--    кнопка выхода-->
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