<?php

class Model {
	private $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

    public function readAll() {
		$sql = 'SELECT * FROM `director`';
		$stm = $this->pdo->prepare($sql);
		$stm->execute();
		$results = $stm->fetchAll(PDO::FETCH_ASSOC);
		return array_map(function ($item) {
		    return new Director($item);
        }, $results);
	}

    public function readMovies($id) {
        $sql = 'SELECT * FROM `films` 
                WHERE `director_id` = (SELECT `id` FROM `director` WHERE `id` =:id)';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function ($item) {
            return new Movie($item);
        }, $results);
    }

	public function getById($id) {
		$sql = 'SELECT * FROM `films` WHERE `id`=:id';
		$stm = $this->pdo->prepare($sql);
		$stm->bindValue(":id", $id);
		$stm->execute();
		return new Movie ($stm->fetch(PDO::FETCH_ASSOC));
	}

	public function getDirectorById($id) {
	    $sql = 'SELECT * FROM `director` WHERE `id`=:id';
	    $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->execute();
        return new Director($stm->fetch(PDO::FETCH_ASSOC));
    }

	public function update(Movie $movie) {
        $sql = 'UPDATE `films` 
                SET `director_id`=:directorId, `title`=:title, `alt_title`=:altTitle, `year`=:year 
                WHERE `id`=:id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(":id", $movie->getId());
        $stm->bindValue(":directorId", $movie->getDirectorId());
        $stm->bindValue(":title", $movie->getTitle());
        $stm->bindValue(":altTitle", $movie->getAltTitle());
        $stm->bindValue(":year", $movie->getYear());
        return $stm->execute();
    }

    public function updateDirector(Director $director) {
	    $sql = 'UPDATE `director` 
                SET `name`=:name, `birth_year`=:birthYear, `nationality`=:nationality 
                WHERE `id`=:id';
	    $stm = $this->pdo->prepare($sql);
	    $stm->bindValue(":id", $director->getId());
	    $stm->bindValue(":name", $director->getName());
	    $stm->bindValue(":birthYear", $director->getBirthYear());
	    $stm->bindValue(":nationality", $director->getNationality());
	    return $stm->execute();
    }

    public function create(Movie $movie) {
		$sql = 'INSERT INTO `films` (`director_id`, `title`, `alt_title`, `year`) 
                VALUES (:directorId, :title, :altTitle, :year)';
		$stm = $this->pdo->prepare($sql);
        $stm->bindValue(":directorId", $movie->getDirectorId());
		$stm->bindValue(":title", $movie->getTitle());
		$stm->bindValue(":altTitle", $movie->getAltTitle());
		$stm->bindValue(":year", $movie->getYear());
		$success = $stm->execute();
		if ($success) {
            $movie->setId($this->pdo->lastInsertId());
        }
		    return $success;
	}

	public function createDirector(Director $director) {
	    $sql = 'INSERT INTO `director` (`name`, `birth_year`, `nationality`) 
                VALUES (:name, :birthYear, :nationality)';
	    $stm = $this->pdo->prepare($sql);
	    $stm->bindValue(":name", $director->getName());
	    $stm->bindValue(":birthYear", $director->getBirthYear());
	    $stm->bindValue(":nationality", $director->getNationality());
	    $success = $stm->execute();
	    if ($success) {
	        $director->setId($this->pdo->lastInsertId());
        }
            return $success;
    }

	public function delete($id) {
	    $sql = 'DELETE FROM `films` WHERE `id`=:id';
	    $stm = $this->pdo->prepare($sql);
	    $stm->bindparam(":id", $id);
	    $stm->execute();
	    return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteDirector($id) {
        $sql = 'DELETE FROM `director` WHERE `id`=:id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindparam(":id", $id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}
