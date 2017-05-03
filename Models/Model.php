<?php

//namespace Models;

//use PDO;

class Model {
	private $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

    public function readAll() {
		$sql = 'SELECT * FROM `films`';
		$stm = $this->pdo->prepare($sql);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		return $stm->fetchAll();
	}

	public function getById($id) {
		$sql = 'SELECT * FROM `films` WHERE `id`=:id';
		$stm = $this->pdo->prepare($sql);
		$stm->bindparam(":id", $id);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		return $stm->fetch();
	}

	public function update(Movie $movie) {
        $sql = 'UPDATE `films` SET `title`=:title, `altTitle`=:altTitle, `director`=:director, `country`=:country, `year`=:year WHERE `id`=:id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindparam(":id", $movie->getId());
        $stm->bindparam(":title", $movie->getTitle());
        $stm->bindparam(":altTitle", $movie->getAltTitle());
        $stm->bindparam(":director", $movie->getDirector());
        $stm->bindparam(":country", $movie->getCountry());
        $stm->bindparam(":year", $movie->getYear());
        return $stm->execute();
    }

    public function create(Movie $movie) {
		$sql = 'INSERT INTO `films` (`title`, `altTitle`, `director`, `country`, `year`) VALUES (:title, :altTitle, :director, :country, :year)';
		$stm = $this->pdo->prepare($sql);
        $stm->bindparam(":title", $movie->getTitle());
		$stm->bindparam(":altTitle",$movie->getAltTitle());
		$stm->bindparam(":director",$movie->getDirector());
		$stm->bindparam(":country",$movie->getCountry());
		$stm->bindparam(":year",$movie->getYear());
		if ($stm->execute()) {
		    $movie->setId($this->pdo->lastInsertId());
            return $movie;
        }
        else
		    return false; //@TODO
	}

	public function delete($id) {
	    $sql = 'DELETE FROM `films` WHERE `id`=:id';
	    $stm = $this->pdo->prepare($sql);
	    $stm->bindparam(":id", $id);
	    $stm->execute();
	    $stm->setFetchMode(PDO::FETCH_ASSOC);
	    return $stm->fetch();
    }
}
