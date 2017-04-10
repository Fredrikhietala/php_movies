<?php
require "movies.php";

$movies = new Movies();

class Crud {
	private $db;

	public function __construct($connection) {
		$this->db = $connection;
	}

	public function readAll() {
		$sql = "SELECT * FROM `films`";
		$stm = $this->db->prepare($sql);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_CLASS, 'Movies');
		return $stm->fetchAll();
	}

	public function getId($id) {
		$sql = "SELECT * FROM `films` WHERE `id`= :id";
		$stm = $this->db->prepare($sql);
		$stm->execute(['id' => $id]);
		$editRow=$stm->fetch(PDO::FETCH_CLASS, 'Movies');
		return $editRow;
	}

	public function update($id, $title, $altTitle, $director, $country, $year) {
		$sql = "UPDATE `films` SET `title`=:title, `swedishTitle`=:altTitle, `director`=:director, `country`=:country, `year`=:year WHERE `id`=:id";
		$stm = $this->db->prepare($sql);
		$stm->bindparam(":title", $movies->title);
		$stm->bindparam(":swedishTitle",$movies->altTitle);
		$stm->bindparam(":director",$movies->director);
		$stm->bindparam(":country",$movies->country);
		$stm->bindparam(":year",$movies->year);
		$stm->execute();
		return true;
	}
}
