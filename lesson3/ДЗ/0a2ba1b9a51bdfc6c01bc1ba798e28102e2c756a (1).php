<!--1.  Создать структуру классов ведения товарной номенклатуры.-->
<!---->
<!---   Есть абстрактный товар.-->
<!---   Есть цифровой товар, штучный физический товар и товар на вес.-->
<!---   У каждого есть метод подсчёта финальной стоимости.-->
<!---   У цифрового товара стоимость постоянная и дешевле штучного товара в два раза, у штучного товара обычная стоимость,-->
<!--у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.-->
<!---   Что можно вынести в абстрактный класс, наследование?-->
<!---->
<!--2.  * Реализовать паттерн Singleton при помощи traits.-->
<!---->

<?php

abstract class Goods
{
    const DIGITAL_GOODS_PRICE = 25;

    protected $profit = "Прибыль";
    protected $expense = "Расходы";
    protected $income = "Доходы";
    protected $commonValue = "Обычная стоимость";

    public function __construct($commonValue)
    {
        $price = $this->commonValue = $commonValue;
        echo $price;
    }

    //Подсчет финальной стоимости
    abstract function getFinalAmount();

    //Прибыль = Доход - Расход
    abstract function getProfit($income, $expense);
}

class DigitalGoods extends Goods
{
    public function getFinalAmount()
    {
        $res = $this->commonValue;
        return $res;
    }

    public function getProfit($income, $expense)
    {
        echo $result = $this->profit = $income - $expense;
    }
}

class SingleGoods extends Goods
{
    public function getFinalAmount()
    {
    }

    public function getProfit($income, $expense)
    {
        echo $result = $this->profit = $income - $expense;
    }
}

class LooseGoods extends Goods
{
    public function getFinalAmount()
    {
    }

    public function getProfit($income, $expense)
    {
        echo $result = $this->profit = $income - $expense;
    }
}

?>

<!--Реализовать паттерн Singleton при помощи traits.-->
<?php

trait getObj
{
    //статический метод для проверки и/или создания объекта в единственном экземпляре
    public static function getObj()
    {
        //если getObj пустой, создаем экземпляр
        if (is_null(self::$objSingleton)) {
            self::$objSingleton = new self();
        }
        ////если getObj не пустой, возращаем экземпляр
        return self::$objSingleton;
    }
}


class MySingletonPattern
{
    private static $objSingleton;

    //С помощью модификатора запрещаем создавать экземпляр класса. Для создания необходимо использовать статический метод.
    private function __construct()
    {
    }

    use getObj;

}

$obj1 = MySingletonPattern::getObj();
var_dump($obj1);