<?php
require "dbconnect.php";

class Movies {

	private $id;
	private $title;
	private $altTitle;
	private $director;
	private $country;
	private $year;

	public function __construct($data = null) {

		if(is_array($data)){
			if (isset($data['id'])) $this->id = $data['id'];

			$this->title = $data['title'];
			$this->altTitle = $data['altTitle'];
			$this->director = $data['director'];
			$this->country = $data['country'];
			$this->year = $data['year'];
		}
	}

	public function getId() {
		return $this->id;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}
	public function getAltTitle() {
		return $this->altTitle;
	}
	public function setAltTitle($newAltTitle) {
		$this->altTitle = $newAltTitle;
	}
	public function getDirector() {
		return $this->director;
	}
	public function setDirector($newDirector) {
		$this->director = $newDirector;
	}
	public function getCountry() {
		return $this->country;
	}
	public function setCountry($newCountry) {
		$this->country = $newCountry;
	}
	public function getYear() {
		return $this->year;
	}
	public function setYear($newYear) {
		$this->year = $newYear;
	}
}
