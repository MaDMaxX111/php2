<?php 

?>
<!doctype html>
<html>
<head>
<?php

?>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>
<body>

<?php
echo "Моя первая программа. <br>";

$name = "Первая переменная";

echo "Первая переменная равна: $name <br>";
echo $name;
echo 'Первая переменная равна: $name <br>';

define('MY_CONST',100);
echo MY_CONST;

$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2a;
echo "<br>";
echo "Десятичная система счисления $int10 <br>";
echo "Двоичная система счисления $int2 <br>";
echo "Восьмиричная система счисления $int8 <br>";
echo "Шестнадцатеричная система счисления $int16 <br>";

$var2 = 1.5;
$var3 = 1.5e4;
$var4 = 6E-8;
echo "--- $var2 ---- $var3 ---- $var4 <br>";

$a = "Здравствуй";
$b = " мир";

$c = $a . $b;
echo "$c <br>";

$a = 4;
$b = 5;

echo $a + $b . "<br>";
echo $a * $b . "<br>";
echo $a - $b . "<br>";
echo $a / $b . "<br>";
echo $a % $b . "<br>";
echo $a ** $b . "<br>";

$a += $b;
echo 'a=' . $a . "<br>";

$a = 0;
echo $a++ . "<br>";
echo ++$a . "<br>";
echo $a-- . "<br>";
echo --$a . "<br>";

$a = 4;
$b = 5;

var_dump($a == $b);
var_dump($a === $b);
var_dump($a > $b);
var_dump($a < $b);
var_dump($a <> $b);
var_dump($a != $b);
var_dump($a !== $b);
var_dump($a <= $b);
var_dump($a >= $b);



?>


</body>
</html>