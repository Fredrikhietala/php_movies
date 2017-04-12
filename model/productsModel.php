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

	public function update($id, $title, $altTitle, $director, $country, $year) {
		$sql = 'UPDATE `films` SET `title`=:title, `altTitle`=:altTitle, `director`=:director, `country`=:country, `year`=:year WHERE `id`=:id';
		$stm = $this->db->prepare($sql);
		$stm->bindparam(":id", $id->getId());
		$stm->bindparam(":title", $title->setTitle($_POST['title']));
		$stm->bindparam(":altTitle",$altTitle->setAltTitle($_POST['altTitle']));
		$stm->bindparam(":director",$director->setDirector($_POST['director']));
		$stm->bindparam(":country",$country->setCountry($_POST['country']));
		$stm->bindparam(":year",$year->setYear($_POST['year']));
		$movies = $stm->execute();
		return $movies;
	}

    public function create($title, $altTitle, $director, $country, $year) {
		$sql = 'INSERT INTO `films` (`title`, `altTitle`, `director`, `country`, `year`) VALUES (:title, :altTitle, :director, :country, :year)';
		$stm = $this->db->prepare($sql);
        $stm->bindparam(":title", $title->getTitle());
		$stm->bindparam(":altTitle",$altTitle->getAltTitle());
		$stm->bindparam(":director",$director->getDirector());
		$stm->bindparam(":country",$country->getCountry());
		$stm->bindparam(":year",$year->getYear());
		$movies=$stm->execute();
        return $movies;
        /*else
		    echo "Error"; //@TODO*/
	}
}
