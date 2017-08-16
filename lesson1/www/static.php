<?
class Test{
   static $x;
   
   static function f(){
		self::$x=5;
		$obj = new Test();
		$obj->usually();
   }   
   
   static function show(){
	    self::f(); 
		echo Test::$x;
   }
   
   function usually(){
	   echo "Тест";
	   //self::show();   
   }
}

class Demo extends Test{
	static function test(){
		parent::show();
	}
}
