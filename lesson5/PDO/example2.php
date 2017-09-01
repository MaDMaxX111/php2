<?
try
{
	$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS);
 
	$rows = $db->exec("CREATE TABLE `testing`(
		id INT PRIMARY KEY AUTO_INCREMENT,
		fname VARCHAR(20) NOT NULL DEFAULT '',
		email VARCHAR(50) NOT NULL DEFAULT '',
		money INT NOT NULL DEFAULT 0) ENGINE=InnoDB;");
 
	$rows = $db->exec("INSERT INTO `testing` VALUES
		(null, 'Ivan', 'ivan@test.com', 15000),
		(null, 'Petr', 'petr@test.com', 411000),
		(null, 'Vasiliy', 'vasiliy@test.com', 1500000)
	");
 
	// Попробуем от Ивана перевести сумму 50000
	// Петру
 
	$summ = 50000;
 
	$transaction = true;
 
	$db->beginTransaction();
 
	$sth1 = $db->query("SELECT money FROM testing WHERE fname='Ivan'");
	$sth2 = $db->query("SELECT money FROM testing WHERE fname='Petr'");
	$row1 = $sth1->fetch();
	$row2 = $sth2->fetch();
 
	if(!$row1 || !$row2) $transaction = false;
 
	$total2 = $summ + $row2['money'];
	$total1 = $row1['money'] - $summ;
 
	if($total1 < 0 || $total2 < 0) $transaction = false;
 
	$num_rows1 = $db->exec("UPDATE `testing` SET money='" . $total1 . "' WHERE fname='Ivan'");
	$num_rows2 = $db->exec("UPDATE `testing` SET money='" . $total2 . "' WHERE fname='Petr'");
 
	if($transaction)
	{
		echo "Транзакция успешно прошла";
	$db->commit();
	}
	else
	{
		echo "Транзакция не прошла";
		$db->rollback();
	}
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}