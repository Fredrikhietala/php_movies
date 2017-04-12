<?php 
require "model/productsModel.php";

$obj = new MoviesCrud($connection);

$movies = $obj->readAll();
include "views/show.php";
//var_dump($movies = $obj->getById(2));


  /*  if (isset($_POST['btn-edit'])) {
        $id = $_REQUEST['edit_id'];
        include "views/update.php";
        $movies = $obj->getById($id);
        var_dump($movies = $obj->getById($id));
    }*/


/*if (isset($_POST['btn-edit'])) {
	include "views/update.php";
	$id = $_REQUEST['edit_id'];
	$obj->getById($id);

	if (isset($_POST['btn-update'])) {
		$id = $_GET['edit_id'];
		$title = $_POST['title'];
		$altTitle = $_POST['swedishTitle'];
		$director = $_POST['director'];
		$country = $_POST['country'];
		$year = $_POST['year'];

		if ($obj->update($id, $title, $altTitle, $director, $country, $year)) {
			echo "<p>Record was succesfully updated</p>";
			header("Location: index.php");
			include "views/show.php";
		}
		else {
			echo "Error";
			header("Location: ../views/update.php");
			include "views/show.php";
		}
	}
}*/

	/*if (isset($_REQUEST['edit_id'])) {
		$id = $_REQUEST['edit_id'];
		extract($obj->getById($_REQUEST['id']));
		include "views/update.php";
	}*/

if (isset($_POST['btn-create'])) {
	include "views/create.php";

	if (isset($_POST['insert'])) {
		$title->setTitle($_POST['title']);
		$altTitle->setAltTitle($_POST['altTitle']);
		$director->setDirector($_POST['director']);
		$country->setCountry($_POST['country']);
		$year->setYear($_POST['year']);

		$movies = $obj->create($title, $altTitle, $director, $country, $year);
			echo "<p>Record was successfully inserted</p>";
			header("Location: index.php");
	}
	else {
		echo "Error";
		header("Location: ../views/create.php");
	}
}