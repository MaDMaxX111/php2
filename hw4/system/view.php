<?php
class View {

	static $twig;

	public function __construct() {

		if (!self::$twig) {

			require_once DIR_ROOT . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'Twig' . DIRECTORY_SEPARATOR . 'Autoloader.php';
			Twig_Autoloader::register();

			try {
				$loader = new Twig_Loader_Filesystem(DIR_TEMPLATES);
				self::$twig = new Twig_Environment($loader);
			}

			catch (Exception $e) {
				die ('ERROR: ' . $e->getMessage());
			}

		}
	}

	public function render($template, $data) {

		$template = self::$twig->loadTemplate($template . '.twig');

		echo $template->render($data);
	}

}