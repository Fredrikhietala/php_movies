<?php
require "movies.php";

$movies = new Movies();

class MoviesCrud {
	private $db;

	public function __construct($connection) {
		$this->db = $connection;
	}

    public function readAll() {
		$sql = 'SELECT * FROM `films`';
		$stm = $this->db->prepare($sql);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_CLASS, 'Movies');
		return $stm->fetchAll();
	}

	public function getById($id) {
		$sql = 'SELECT * FROM `films` WHERE `id`= :id';
		$stm = $this->db->prepare($sql);
		$stm->bindparam(':id', $id);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_CLASS, 'Movies');
		return $stm->fetch();
	}

	public function update(\Movies $movies) {
		$sql = 'UPDATE `films` SET `title`=:title, `altTitle`=:altTitle, `director`=:director, `country`=:country, `year`=:year WHERE `id`=:id';
		$stm = $this->db->prepare($sql);
		$stm->bindParam(":id", $movies->id);
		$stm->bindparam(":title", $movies->title);
		$stm->bindparam(":altTitle",$movies->altTitle);
		$stm->bindparam(":director",$movies->director);
		$stm->bindparam(":country",$movies->country);
		$stm->bindparam(":year",$movies->year);
		return $stm->execute();
	}

	public function create(\Movies $movies) {
		if (isset($movies->id)) {
			return $this->update($movies);
		}

		$sql = 'INSERT INTO `films` (`title`, `altTitle`, `director`, `country`, `year`) VALUES (:title, :altTitle, :director, :country, :year)';
		$stm = $this->db->prepare($sql);
		$stm->bindparam(":title", $movies->setTitle());
		$stm->bindparam(":altTitle",$movies->setAltTitle());
		$stm->bindparam(":director",$movies->setDirector());
		$stm->bindparam(":country",$movies->setCountry());
		$stm->bindparam(":year",$movies->setYear());
		return $stm->execute();
	}
}
