<?php
class HomeModel {

	private $db;

	public function __construct() {

		$this->db = new DB();
	}
	
	public function getPictures() {

		$query = $this->db->query("SELECT * FROM `image` ORDER BY `review` DESC");
		return $query;
	}

	public function getPicture($picture_id) {

		$query = $this->db->query("SELECT DISTINCT * FROM image where id='" . (int)$picture_id . "'");

		if (is_array($query)) {
			return array_shift($query);
		}
	}

	public function addPicture($name, $size) {

		$this->db->query("INSERT INTO image (file, size, date, review) VALUES ('" . $name . "', ". $size .", now(), 0)");

	}

	public function incReview($picture_id) {

		$this->db->query("UPDATE image set `review` = `review` + 1 where id='" . (int)$picture_id . "'");

	}
}
