<?

abstract class Car {
   abstract function drive();

   function show(){
	  echo "����";
   }
   
}

class Run extends Car{
	function drive(){
		echo "�����";
	}
}
$obj = new Run();
$obj->drive();