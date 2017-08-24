<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>

<body>
<?php
$x = 5;
$y = 5;

if ($x > $y)
{
	echo "x больше y <br>";
}
else
if ($x < $y)
{
	echo "x меньше y <br>";
}
else 
{
	echo "x равен y <br>";
}

$now = 'morning';

switch ($now)
{
	case 'night':
		echo "Доброй ночи <br>";
	break;
	
	case 'morning':
		echo "Доброе утро <br>";
	break;
	
	case 'evening':
		echo "Добрый вечер <br>";
	break;
	
	default:
		echo "Ни одно условие не сработало <br>";
	break;
}

$max = ($x > $y) ? $x : $y;
echo "максимальное значение: $max <br>";

function compare_numbers($x1, $y1)
{
	if ($x1 > $y1)
	{
		echo "$x1 > $y1 <br>";
	}
	else
	if ($x1 < $y1)
	{
		echo "$x1 < $y1 <br>";
	}
	else
	{
		echo "$x1 = $y1 <br>";
	}
}

compare_numbers(10,20);
compare_numbers(30,10);
compare_numbers(10,10);

function average($x2, $y2)
{
	return ($x2 + $y2) / 2;
}

$avg = average(10,35);
echo $avg . "<br>";

function mult($x, $y = 10)
{
	return $x * $y;
}

echo mult(15) . "<br>";
echo mult(5,5) . "<br>";

function fibonachi($n, $prev1 = 1, $prev2 = 0)
{
	$current = $prev1 + $prev2;
	echo $current . " ";
	if ($n > 1)
	{
		fibonachi($n - 1, $current, $prev1);
	}
}

fibonachi(5);
echo "<br>";

//ChangeX(34);

function ChangeX($x)
{
	$x += 5;
	echo $x . "<br>";
	echo "y=" . $y . "<br>";
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";
}

$y =10;
$x = 1;
echo $x . "<br>";
ChangeX($x);
echo $x . "<br>";


?>


</body>
</html>