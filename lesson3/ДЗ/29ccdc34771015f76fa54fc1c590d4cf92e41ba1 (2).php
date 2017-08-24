<?php

//Задания 1-1.5

abstract class Item{

    protected $price;
    protected $sold_amt;

    protected function finalPrice($markup, $price){
       $this->price = $price * $markup;
    }

    public function calcProfit(){
        return $this->price * $this->sold_amt;
    }

    public function getPrice(){
        return $this->price;
    }

}

class SingleItem extends Item{

    const SINGLE_ITEM_MARK_UP = 1.25;

    public function __construct($price){
        parent::finalPrice(self::SINGLE_ITEM_MARK_UP, $price);

    }

//    public function finalPrice($price){
//        $this->price = ($price * self::SINGLE_ITEM_MARK_UP);
//    }
// Решил убрать повторяющийся код

    public function itemSold(){
        $this->sold_amt++;
    }
}

class WeighedItem extends Item{

    const WEIGHED_ITEM_MARK_UP = 1.15;

    public function __construct($price){
        parent::finalPrice(self::WEIGHED_ITEM_MARK_UP, $price);

    }

//    public function finalPrice($price){
//        $this->price = ($price * self::WEIGHED_ITEM_MARK_UP);
//    }
//  Решил убрать повторяющийся код

    public function itemSold($amt){
        $this->sold_amt += $amt;
    }
}

class DigitalItem extends SingleItem{

    public function __construct($price)
    {
        parent::__construct($price);
    }
}

class OtherItem extends SingleItem{

    public function __construct($price)
    {
        parent::__construct($price);
    }
}

$digital_item = new DigitalItem(10);
$other_item = new OtherItem(20);
$weighed_item = new WeighedItem(10);

echo 'Вывести цену продуктов:';
echo '<br>'.$digital_item->getPrice(). '</br>';
echo '<br>'.$other_item->getPrice(). '</br>';
echo '<br>'.$weighed_item->getPrice(). '</br>';

for($i = 0; $i < 10; $i++){
    $digital_item->itemSold();
    $other_item->itemSold();
}

$weighed_item->itemSold(7.400);

echo 'Вывести итоговую прибыль от продажи';
echo '<br>'.$digital_item->calcProfit(). '</br>';
echo '<br>'.$other_item->calcProfit(). '</br>';
echo '<br>'.$weighed_item->calcProfit(). '</br>';



// Задание 2
trait MySingleton{

    private function __construct(){
    }

    private function __clone(){
    }

    private function __wakeup(){
    }

    public static function getInstance(){
        static $instance;
        if(empty($instance)){
            $instance = new self();
        }
        return $instance;
    }

    public function doAction(){
        var_dump(self::getInstance());
    }


}

class Singleton{
    use MySingleton;
}

Singleton::getInstance()->doAction();