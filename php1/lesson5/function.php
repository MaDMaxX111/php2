<?php

function getResult($sql) //Функция получения данных из БД
{
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$result = mysqli_query($db, $sql);
	$array_result = array();
	
	while ($row = mysqli_fetch_assoc($result))
	{
		$array_result[] = $row;
	}
	
	echo "<pre>";
//	print_r($result);
//	echo "------!!!!-----------";
//	print_r($array_result);
	echo "</pre>";
	
	mysqli_close($db);
	return($array_result);

	
}

function executeQuery($sql)
{
	$db = mysqli_connect(HOST, USER, PASS, DB);
	$resul = mysqli_query($db, $sql);
	mysqli_close($db);
	return $resul;
}

?>