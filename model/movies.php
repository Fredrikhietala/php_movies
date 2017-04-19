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
