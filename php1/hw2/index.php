<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.01.2017
 * Time: 9:54
 */
//●	Объявите две целочисленные переменные $a и $b и задайте им произвольные
//начальные значения. Затем напишите скрипт, который работает по следующему
//принципу:
//a. если $a и $b положительные, выведите их разность;
//b. если $а и $b отрицательные, выведите их произведение;
//c. если $а и $b разных знаков, выведите их сумму.
//Ноль можно считать положительным числом.

echo 'Часть №1:<br><br>';

$a = -13;
$b = -68;

if ($a>=0 && $b>=0) {
	echo $a-$b . '<br>';
} else if ($a<0 && $b<0) {
	echo $a*$b . '<br>';
} else {
	echo $a+$b . '<br>';
}

//●	Присвойте переменной $а значение в промежутке [0..15]. С помощью оператора
//switch организуйте вывод чисел от $a до 15.

echo '<br><br>Часть №2:<br><br>';

$a = 3;

switch ($a) {

	case 0: echo '0 <br>';
	case 1: echo '1 <br>';
	case 2: echo '2 <br>';
	case 3: echo '3 <br>';
	case 4: echo '4 <br>';
	case 5: echo '5 <br>';
	case 6: echo '6 <br>';
	case 7: echo '7 <br>';
	case 8: echo '8 <br>';
	case 9: echo '9 <br>';
	case 10: echo '10 <br>';
	case 11: echo '11 <br>';
	case 12: echo '12 <br>';
	case 13: echo '13 <br>';
	case 14: echo '14 <br>';
	case 15: echo '15 <br>'; break;
	default: echo 'Недопустимое значение переменной $a <br>';

}

//●	Реализуйте основные 4 арифметические операции в виде функций с
//двумя параметрами. Обязательно используйте оператор return.

echo '<br><br>Часть №3:<br><br>';
echo 'Начальные переменные:<br>';

$a = 13;
$b = 68;

echo '$a=' . $a . ';<br>';
echo '$b=' . $b . ';<br>';

echo 'Сумма переменных: '       . sum($a, $b) . ';<br>';
echo 'Разность переменных: '    . diff($a, $b) . ';<br>';
echo 'Перемножение переменных: '. mult($a, $b) . ';<br>';
echo 'Деление переменных: '     . div($a, $b) . ';<br>';

function sum($a, $b){
	return $a+$b;
}

function diff($a, $b){
	return $a-$b;
}

function mult($a, $b){
	return $a*$b;
}

function div($a, $b){
	return $a/$b;
}

//●	Реализуйте функцию с тремя параметрами: function mathOperation($arg1, $arg2,
//                                                                    $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием
//операции. В зависимости от переданного значения операции выполните одну из
//арифметических операций (используйте функции из пункта 3) и верните
//полученное значение (используйте switch).

echo '<br><br>Часть №4:<br><br>';

echo 'Начальные переменные:<br>';

$a = 25;
$b = 32;

echo '$a=' . $a . ';<br>';
echo '$b=' . $b . ';<br>';

echo 'Сумма переменных: '           . mathOperation($a, $b, 'sum') . ';<br>';
echo 'Разность переменных: '        . mathOperation($a, $b, 'diff') . ';<br>';
echo 'Перемножение переменных: '    . mathOperation($a, $b, 'mult') . ';<br>';
echo 'Деление переменных: '         . mathOperation($a, $b, 'div') . ';<br>';



function mathOperation($arg1, $arg2, $operation) {

	switch ($operation){
		case 'sum':     return sum($arg1, $arg2);
		case 'diff':    return diff($arg1, $arg2);
		case 'mult':    return mult($arg1, $arg2);
		case 'div':     return div($arg1, $arg2);
		default:        return false;
	}
}


//●	Посмотрите на встроенные функции PHP. Используя имеющийся HTML шаблон, выведите текущий год в подвале при помощи встроенных функций PHP.

echo '<br><br>Часть №5:<br><br>';

date_default_timezone_set('UTC');
echo 'Текущий год: ' . date(Y) . '<br>';


//●	С помощью рекурсии организуйте функцию возведения числа в степень. Формат:
//function power($val, $pow), где $val – заданное число, $pow – степень.

echo '<br><br>Часть №6:<br><br>';

echo power(6, 4);

function power($val, $pow){

	if ($pow == 1){
		return $val;
	} else {
		return $val*power($val, $pow-1);
	}
}

//●	Напишите функцию, которая вычисляет текущее время и возвращает его в формате
//с правильными склонениями, например:
//      22 часа 15 минут
//      21 час 43 минуты

echo '<br><br>Часть №7:<br><br>';

echo 'Текущее время: ' . getCurrentTime() . '<br>';

function getCurrentTime(){

	date_default_timezone_set('UTC');
	$hours = date(G);
	$minuts = date(i);

	$post_hours = numberof($hours, array('час', 'часа', 'часов'));
	$post_min   = numberof($minuts, array('минута', 'минуты', 'минут'));


	return $hours . ' ' . $post_hours . ' ' . $minuts . ' ' . $post_min;
}

function numberof ($val, $array){
	$cases = array (2, 0, 1, 1, 1, 2);
	$string = $array[ ($val%100>4 && $val%100<20)? 2 : $cases[min($val%10, 5)] ];
	return $string;
}

//echo "test 'часов'<br>";
//for ($i=0; $i<24; $i++){
//	echo $i . ' ' . numberof($i, array('час', 'часа', 'часов')) . '<br>';
//}
//
//echo "test 'минут'<br>";
//for ($i=0; $i<60; $i++){
//	echo $i . ' ' . numberof($i, array('минута', 'минуты', 'минут')) . '<br>';
//}

?>