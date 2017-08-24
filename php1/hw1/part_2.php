<?php
/**
 * Created by PhpStorm.
 * User: MaDMaxX
 * Date: 15.01.17
 * Time: 9:19
 */

//●	Используя имеющийся HTML шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.
$header = 'Заголовок';
date_default_timezone_set('UTC');
$date = date(Y);
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "<meta charset=\"UTF-8\">\n";
echo "<title>Title</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "<h1>$header</h1>\n";
echo "<p>Copyright $date</p>\n";
echo "</body>\n";
echo "</html>\n";
?>