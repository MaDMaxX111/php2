<? require_once('../engine/functions.php');
// проверяем есть ли запрос
if (isset($_POST)) {
//	проверяем наличие переменных
	if (isset($_POST['arg1']) && isset($_POST['arg2']) && isset($_POST['operation'])){

//		в зависимости от операции вызываем соответсвующую функцию
		switch ($_POST['operation']){
			case 'plus':
				$result = plus((int)$_POST['arg1'], (int)$_POST['arg2']);
				break;
			case 'minus':
				$result = minus((int)$_POST['arg1'], (int)$_POST['arg2']);
				break;
			case 'multiplication':
				$result = multiplication((int)$_POST['arg1'], (int)$_POST['arg2']);
				break;
			case 'division':
				$result = division((int)$_POST['arg1'], (int)$_POST['arg2']);
				break;
		}

	}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Calculator</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="?" ">
	<div>
		<input name="arg1" type="number" value="<? if (isset($_POST['arg1'])){ echo $_POST['arg1']; }?>" />
		<select name="operation">
			<option value="plus"<? if ( isset($_POST['operation']) && $_POST['operation'] == 'plus') { echo ' selected';} ?>>+</option>
			<option value="minus"<? if ( isset($_POST['operation']) && $_POST['operation'] == 'minus') { echo ' selected';} ?>>-</option>
			<option value="multiplication"<? if ( isset($_POST['operation']) && $_POST['operation'] == 'multiplication') { echo ' selected';} ?>>&times;</option>
			<option value="division"<? if ( isset($_POST['operation']) && $_POST['operation'] == 'division') { echo ' selected';} ?>>&divide;</option>
		</select>
		<input name="arg2" type="number" value="<? if (isset($_POST['arg2'])){ echo $_POST['arg2']; }?>" />
		<span> = </span>
		<input readonly value="<? if (isset($result)){ echo $result; }?>"/>
	</div>
	<div style="margin-top: 20px;">
		<button type="submit">Calculate</button>
		<button type="reset">Reset</button>
	</div>
</form>
</body>
</html>
