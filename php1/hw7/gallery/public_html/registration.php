<?php
include '../config/config.php';
include '../engine/function.php';

if (isset($_POST['registration'])){

    $error = validate_reg_form($_POST['login'], $_POST['name'], $_POST['password1'], $_POST['password2']);
    if (!$error){
        if(registration_user($_POST['login'], $_POST['name'], $_POST['password1']))
        {
            header('Location:' . 'index.php');
        };
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Registration user</title>
</head>
<body>
<div class="row">
<div class="col-md-6">
    <form method="post" enctype="multipart/form-data" action="?">
        <div class="form-group">
            <label for="imputLogin">Логин</label>
            <input type="text" class="form-control" id="imputName" name="login" placeholder="Логин"<?php if(isset($_POST['login'])) { ?> value="<?php echo $_POST['login']?>"<?php } ?>>
            <?php if (isset($error['error_login'])) { ?>
                <div><?php echo $error['error_login']?></div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="imputName">Имя</label>
            <input type="text" class="form-control" id="imputName" name="name" placeholder="Имя"<?php if(isset($_POST['name'])) { ?> value="<?php echo $_POST['name']?>"<?php } ?>>
            <?php if (isset($error['error_name'])) { ?>
                <div><?php echo $error['error_name']?></div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword1">Пароль:</label>
            <input type="password" class="form-control" id="inputPassword1" name="password1" placeholder="Введите пароль"<?php if(isset($_POST['password1'])) { ?> value="<?php echo $_POST['password1']?>"<?php } ?>>
            <?php if (isset($error['error_password'])) { ?>
                <div><?php echo $error['error_password']?></div>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword2">Подтвердите пароль:</label>
            <input type="password" class="form-control" id="inputPassword2" name="password2" placeholder="Подтвердите пароль"<?php if(isset($_POST['password2'])) { ?> value="<?php echo $_POST['password2']?>"<?php } ?>>
        </div>
        <button type="submit" name="registration" value="1" class="btn btn-default">Зарегистрироваться</button>
    </form>
</div>
</div>
</body>
</html>
