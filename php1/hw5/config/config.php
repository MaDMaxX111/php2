<?php
$document_root = $_SERVER["DOCUMENT_ROOT"];
define('DIR_IMAGES', 'pictures');
define('DIR_CACHE', DIR_IMAGES . '/cache');
define('MAX_SIZE_UPLOAD_FILES', '2097152');
define('WIDTH_IMAGE', '200');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'mysql');
define('DB', 'gallery');
?>