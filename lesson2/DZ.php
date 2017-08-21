<?
//Задание 1//Задание 2//Задание 3
class Hardware {
    public $id;
    public $title;
    public $price;
    function getHardware() {
        return "{$this->id}<br> {$this->title}<br> {$this->price}<br>";
    }
}
$hardware2 = new Hardware();
$hardware2->id = 54321;
$hardware2->title = "tempTitle";
$hardware2->price = 150;
echo $hardware2->getHardware()."<br>";

//Задание 4
class CpuHardware extends Hardware {
    public $description;
    public $socket;
    public $clockspeed;
    function getCpu() {
        return "{$this->description}<br> {$this->socket}<br> {$this->clockspeed}<br>";
    }
}
$hardware3 = new cpuHardware();
$hardware3->id = 12345;
$hardware3->title = "titleTemp";
$hardware3->price = 300;
$hardware3->description = "Core i5";
$hardware3->socket = 1151;
$hardware3->clockspeed = "4.0 GHz";
echo $hardware3->getHardware();
echo $hardware3->getCpu()."<br>";

//Задание 5
class A1 {
    public function foo1() {
        static $x1 = 0;
        echo ++$x1."<br>";
    }
}

$a11 = new A1(); //создаём объект класса А1
$a21 = new A1(); //создаём объект класса А1

$a11->foo1(); //обращаемся к функции foo1 класса А1, значение значение х1 в которой становится равной 1
$a21->foo1(); //обращаемся к функции foo1 класса А1, значение значение х1 в которой становится равной 2
$a11->foo1(); //обращаемся к функции foo1 класса А1, значение значение х1 в которой становится равной 3
$a21->foo1(); //обращаемся к функции foo1 класса А1, значение значение х1 в которой становится равной 4
echo "<br>";

//Задание 6
class A2 {
    public function foo2() {
        static $x2 = 0;
        echo ++$x2."<br>";
    }
}

class B2 extends A2 { //создаём класс В2, который расширяет класс А2
}

$a12 = new A2(); //создаём объект класса А2
$b12 = new B2(); //создаём объект класса В2

$a12->foo2(); //обращаемся к функции foo2 класса А2, значение значение х2 в которой становится равной 1
$b12->foo2(); //обращаемся к функции foo2 класса В2, значение значение х2 в которой становится равной 1, т.к. класс В2 содержит в себе функции класс А2, но не является им.
$a12->foo2(); //обращаемся к функции foo2 класса А2, значение значение х2 в которой становится равной 2
$b12->foo2(); //обращаемся к функции foo2 класса В2, значение значение х2 в которой становится равной 2, т.к. класс В2 содержит в себе функции класс А2, но не является им.
echo "<br>";

//Задание 7
class A3 {
    public function foo3 () {
        static $x3 = 0;
        echo ++$x3."<br>";
    }
}
class B3 extends A3 {
}
$a13 = new A3; //Так как аргументы не передаются, скобки после имени класса необязательны
$b13 = new B3; //Так как аргументы не передаются, скобки после имени класса необязательны
$a13 -> foo3 (); //в остальном здесь так же как в задании 6 - 1
$b13 -> foo3 (); //1
$a13 -> foo3 (); //2
$b13 -> foo3 (); //2
echo "<br>";
