<?php
require "dbconnect.php";

class Movies {

	private $id;
	private $title;
	private $swedishTitle;
	private $director;
	private $country;
	private $year;

	public function __construct($id, $title, $altTitle, $director, $country, $year) {

			$this->id = $id;
			$this->title = $title;
			$this->altTitle = $altTitle;
			$this->director = $director;
			$this->country = $country;
			$this->year = $year;
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