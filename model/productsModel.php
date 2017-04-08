<?php
//require "dbconnect.php";

class Connection {
	public $connection;

	public function __construct(PDO $connection = null) {
		$this->connection = $connection;
		if ($this->connection === null) {
			$this->connection = new PDO (
				'mysql:host=localhost;dbname=movies',
				'root',
				'root'
				);
			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
		}
	}
	public function showAll() {
		$sql = "SELECT * FROM `movies`"
		$stm = $this->connection->prepare($sql);
	}
}
