<?
class Building{
	static $colEt;	
	static $colMen;
	static $S1;
	
	static function getS($x1,$x2,$x3){
		self::$colEt = $x1;
		self::$colMen = $x2;
		self::$S1 = $x3;
		
		$res = self::S1 * self::colEt / self::colMen;	
			
	}
}