<?php
class DB {

	private $connection;

	public function __construct() {

		$this->connection = new mysqli(HOST, USER, PASS, DB, DB_PORT);

		if ($this->connection->connect_error) {
			throw new \Exception('Error: ' . $this->connection->error . '<br />Error No: ' . $this->connection->errno);
		}

	}

	public function query($sql) {
		
		try {
			$query = $this->connection->query($sql);

			$data = array();

			if ($query->num_rows) {

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

				$query->close();

			}

			return $data;

		}

		catch (Exception $e) {
			echo "Ошибка {$e->getCode()} : {$e->getMessage()}";
		}

	}

	public function __destruct() {
		$this->connection->close();
	}
}
