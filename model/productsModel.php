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
		$sql = 'SELECT "Movies", films.* FROM `films` WHERE `id`= :id';
		$stm = $this->db->prepare($sql);
		$stm->bindparam(':id', $id);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_CLASS, 'Movies');
		return $stm->fetch();
	}

	public function update(\Movies $movies) {
		$sql = 'UPDATE `films` SET `title`=:title, `altTitle`=:altTitle, `director`=:director, `country`=:country, `year`=:year WHERE `id`=:id';
		$stm = $this->db->prepare($sql);
		$stm->bindparam(":id", $movies->getId());
		$stm->bindparam(":title", $movies->setTitle($_POST['title']));
		$stm->bindparam(":altTitle",$movies->setAltTitle($_POST['altTitle']));
		$stm->bindparam(":director",$movies->setDirector($_POST['director']));
		$stm->bindparam(":country",$movies->setCountry($_POST['country']));
		$stm->bindparam(":year",$movies->setYear($_POST['year']));
		return $stm->execute();
	}

    public function create(\Movies $movies) {
		$sql = 'INSERT INTO `films` (`title`, `altTitle`, `director`, `country`, `year`) VALUES (:title, :altTitle, :director, :country, :year)';
		$stm = $this->db->prepare($sql);
        $stm->bindparam(":title", $movies->setTitle($_POST['title']));
		$stm->bindparam(":altTitle",$movies->setAltTitle($_POST['altTitle']));
		$stm->bindparam(":director",$movies->setDirector($_POST['director']));
		$stm->bindparam(":country",$movies->setCountry($_POST['country']));
		$stm->bindparam(":year",$movies->setYear($_POST['year']));
		return $results = $stm->execute();
	}
}
