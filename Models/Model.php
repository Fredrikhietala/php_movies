<?php

class Model {
	private $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

    public function readAll() {
		$sql = 'SELECT * FROM `films`';
		$stm = $this->pdo->prepare($sql);
		$stm->execute();
		$results = $stm->fetchAll(PDO::FETCH_ASSOC);
		return array_map(function ($item) {
		    return new Movie($item);
        }, $results);
	}

	public function getById($id) {
		$sql = 'SELECT * FROM `films` WHERE `id`=:id';
		$stm = $this->pdo->prepare($sql);
		$stm->bindparam(":id", $id);
		$stm->execute();
		return new Movie ($stm->fetch(PDO::FETCH_ASSOC));
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
		$success = $stm->execute();
		if ($success) {
            $movie->setId($this->pdo->lastInsertId());
        }
		    return $success;
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
