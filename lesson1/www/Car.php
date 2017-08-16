<?
class Car{
	public	$name="Audi";
	var $price;

	function __construct($name,$price){
		$this->name = $name;	
		$this->price = $price;
		//$this->drive();
	}
	
	
	
	public function drive(){
		echo $this->name." стоит ".$this->price."<br>";		
	}
}

class RaceCar extends Car{
	var $speed;
	
	function __construct($name,$price,$speed){
		/*$this->name = $name;
		$this->price = $price;*/
		parent::__construct($name,$price);
		$this->speed = $speed;
		$this->drive();
	}
	
	protected function drive(){
		echo "Автомобиль ".$this->name." разгоняется до скорости ".$this->speed;
	}
}	

$obj1 = new RaceCar("VW",12000,240);
$obj1->drive();

