<?php
class Home {

	private $data;
	private $view;

	public function __construct() {
		$this->data = array(
			'key1' => '1',
			'key2' => '2',
			'key3' => '3'
		);

		$this->view = new View();
		$this->view->render('home', $this->data);
	}
}
