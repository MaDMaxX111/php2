<?
class Education{
	var $a;	
	var $b;
	var $c;

	function D(){
		return $this->b*$this->b - 4 * $this->a * $this->c;	
	}
	
	function result($a,$b,$c){
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
		if($this->D()<0)
			die("Нет решения");
		
		$x1 = (-$b + sqrt($this->D()))/(2*$a);	
		$x2 = (-$b - sqrt($this->D()))/(2*$a);
		echo "x1=$x1<br>x2=$x2";
	}	
}

$obj = new Education();
$obj->result(1,-5,-10);
