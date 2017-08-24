<?php

abstract class Product {
    
    const PROFIT_PERCENT = 10;  // Процент прибыли уже заложенный в стоимость каждого товара
    
    abstract public function totalCost();   // Финальная стоимость товара с учётом кол-ва или веса
    
    abstract public function profitCalc();  // Доход получаемый с продажи товара с учётом PROFIT_PERCENT

}

/*
Судя по заданию, у нас цифровой и штучный товар связаны: "У цифрового товара стоимость постоянная и дешевле штучного товара в два раза..".
Отсюда берём за основу цифровой товар и потом наследуем от него уже физический штучный.
*/

class ProductDigital extends Product {
    
    const PRICE = 100;
    private $amount;

    public function __construct($amount)
    {
        self::setAmount($amount);
    }
    
    public function getPrice() {
        return PRICE;
    }
    
    public function getAmount() {
        return $this->amount;
    }
    
    public function setAmount($amount=0)
    {
        $this->amount = $amount;
    }
    
    public function totalCost()
    {
        return self::PRICE * $this->amount;
    }

    public function profitCalc()
    {
        return self::PRICE * $this->amount / 100 * parent::PROFIT_PERCENT;
    }

}

class ProductReal extends ProductDigital {
    
    public function getPrice() {
        return parent::PRICE * 2;
    }
    
    public function totalCost()
    {
        return self::PRICE * 2 * parent::getAmount();
    }
    
    public function profitCalc()
    {
        return parent::PRICE * 2 * parent::getAmount() / 100 * parent::PROFIT_PERCENT;
    }

}

/*
Весовой продукт идёт отдельно от двух предыдущих.
Наследуем от Product
*/

class ProductWeight extends Product {
    
    private $price;
    private $wieght;
    
    public function __construct($price, $wieght)
    {
        self::setPrice($price);
        self::setWieght($wieght);
    }
    
    public function setPrice($price=0)
    {
        $this->price = $price;
    }
    
    public function setWieght($wieght=0)
    {
        $this->wieght = $wieght;
    }
    
    public function totalCost()
    {
        return $this->price * $this->wieght;
    }
    
    public function profitCalc()
    {
        return $this->price * $this->wieght / 100 * parent::PROFIT_PERCENT;
    }

}


$obj_digital = new ProductDigital(3);
echo $obj_digital->profitCalc();

$obj_real = new ProductReal(3);
echo $obj_real->profitCalc();

$obj_weight = new ProductWeight(3, 300);
echo $obj_weight->profitCalc();

?>