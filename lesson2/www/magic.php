<?
class Some{
	public $name;	
	
	public function __construct($name){
		$this->name = $name;
	}
	
	public function view(){
		echo $this->name;
	}
	
	public function __get(){
		return null;	
	}
	
	public function __set($name,$value){
		$this->name = $value; 
	}
	
	
}

$some = new Some;
echo $some->b;
echo $some->name;
$some->a = 'test';
$some->f();



