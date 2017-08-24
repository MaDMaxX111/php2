<?php
class Model {

	static function loadModel($model) {

		$class = '';

		$model_file = DIR_MODEL . DIRECTORY_SEPARATOR . $model . '.php';

		// проверяем есть ли файл модели такой
		if (file_exists($model_file)) {
			require_once $model_file;

			$class_name = $model . 'Model';

			try {
				$class = new $class_name();
			}

			catch (Exception $e) {
				echo "Ошибка {$e->getCode()} : {$e->getMessage()}";
			}

		}

		return $class;

	}
}