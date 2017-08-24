<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.01.2017
 * Time: 14:36
 */
include '../engine/function.php';
include '../config/config.php';

if (isset($_POST['createdb'])){

	$results = create_db();

	if (isset($results['error'])) {
		$message_type = 'error';
		$message      = $results['error'];
	} else {
		$message_type = 'success';
		$message      = $results['success'];
	}

	header('Location:' . $_POST['redirect'] . '?message_type=' . $message_type . '&message=' . $message);

}