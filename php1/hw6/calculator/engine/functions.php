<?php
	function plus($a, $b){
		return $a+$b;
	}

	function minus($a, $b){
		return $a-$b;
	}

	function multiplication($a, $b){
		return $a*$b;
	}

	function division($a, $b){
		if ($b){
			return $a/$b;
		} else {
			return 'ОШИБКА!!! Деление на ноль';
		}
	}
?>