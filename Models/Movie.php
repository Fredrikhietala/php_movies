<?php

namespace Models;

class Movie {

	private $id;
	private $title;
	private $altTitle;
	private $director;
	private $country;
	private $year;

	public function __construct($movie_data = []) {

        if (isset($movie_data['id'])) {
            $this->id = $movie_data['id'];
            $this->title = $movie_data['title'];
            $this->altTitle = $movie_data['altTitle'];
            $this->director = $movie_data['director'];
            $this->country = $movie_data['country'];
            $this->year = $movie_data['year'];
        }
	}

	public function getId() {
		return $this->id;
	}
    public function setId($id) {
        $this->id = $id;
    }
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
	}
	public function getAltTitle() {
		return $this->altTitle;
	}
	public function setAltTitle($altTitle) {
		$this->altTitle = $altTitle;
	}
	public function getDirector() {
		return $this->director;
	}
	public function setDirector($director) {
		$this->director = $director;
	}
	public function getCountry() {
		return $this->country;
	}
	public function setCountry($country) {
		$this->country = $country;
	}
	public function getYear() {
		return $this->year;
	}
	public function setYear($year) {
		$this->year = $year;
	}
}
