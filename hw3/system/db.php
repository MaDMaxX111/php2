<?php
class DB {

	private $connection;

	public function __construct($hostname, $username, $password, $database, $port = '3306') {

		$this->connection = new mysqli($hostname, $username, $password, $database, $port);

		if ($this->connection->connect_error) {
			throw new \Exception('Error: ' . $this->connection->error . '<br />Error No: ' . $this->connection->errno);
		}

	}

	public function query($sql) {

		try {
			$query = $this->connection->query($sql);

			$data = array();

			if ($query) {

				while ($row = $query->fetch_assoc()) {
					$data[] = $row;
				}

			}

			$query->close();
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
