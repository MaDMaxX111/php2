<?

abstract class Car {
   abstract function drive();

   function show(){
	  echo "עוסע";
   }
   
}

class Run extends Car{
	function drive(){
		echo "הנאיג";
	}
}
$obj = new Run();
$obj->drive();