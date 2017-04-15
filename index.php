<?php 
require "model/productsModel.php";

$obj = new MoviesCrud($connection);

if (!empty($movie)) {
    $movie = $obj->readAll();
    include "views/show.php";
}
//var_dump($movies = $obj->getById(2));
/*if (isset($_POST['btn-create'])) {
    include "views/create.php";

    if (isset($_POST['insert'])) {
        $title = $movie->setTitle($_POST['title']);
        $altTitle = $movie->setAltTitle($_POST['altTitle']);
        $director = $movie->setDirector($_POST['director']);
        $country = $movie->setCountry($_POST['country']);
        $year = $movie->setYear($_POST['year']);

        if ($movies = $obj->create($title, $altTitle, $director, $country, $year)) {
            echo "<div class='alert alert-success'>Movie was inserted</div>";
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Unable to insert product</div>";
            header("Location: ../views/create.php");
        }
    }
}*/


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
			echo "<p>Record was successfully updated</p>";
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

