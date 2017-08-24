<?php
class Route {
	const HOME = 'home';
	static $count;
	
	static function start($url = '') {

		$url = array_pop(explode('/', $url));

		// отделяем url от параметров
		preg_match('/^([^?]+)\?*/', $url, $matches);
		
		if (!isset($matches[1])) {
			$action = self::HOME;
		} else {
			$action= $matches[1];
		}

		$action_file = DIR_APP . DIRECTORY_SEPARATOR . $action . '.php';

		// проверяем есть ли контроллер такой
		if (file_exists($action_file)) {
			require_once $action_file;

			try {
				$action = new $action();
			}

			catch (Exception $e) {
				echo "Ошибка {$e->getCode()} : {$e->getMessage()}";
			}

		} else {
			self::start(self::HOME);
		}

	}

}