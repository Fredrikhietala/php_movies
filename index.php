<?php 
require "model/productsModel.php";
//global $movie;
$obj = new MoviesCrud($connection);
$movie = new Movies($connection);

$qs = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($qs)) {
        require_once "views/start.php";
    }
    elseif ($qs === "show") {
        $movie = $obj->readAll();
        require_once "views/show.php";
        if (isset($_POST['btn-delete'])) {
            $id = $_REQUEST['delete'];
            $movie = $obj->delete($id);
            header("Location: index.php?page=show");
        }
    }
    elseif ($qs === "create") {
        require_once "views/create.php";
        if (isset($_POST['insert'])) {
            $title = $_POST['title'];
            $movie->setTitle($title);
            $altTitle = $_POST['altTitle'];
            $movie->setAltTitle($altTitle);
            $director = $_POST['director'];
            $movie->setDirector($director);
            $country = $_POST['country'];
            $movie->setCountry($country);
            $year = $_POST['year'];
            $movie->setYear($year);

            if ($movies = $obj->create($title, $altTitle, $director, $country, $year)) {
                echo "<div class='alert alert-success'>Movie was inserted</div>";
                header("Location: index.php?page=show");
            } else {
                echo "<div class='alert alert-danger'>Unable to insert movie</div>";
                header("Location: index.php?page=create");
            }
        }
    }
    elseif ($qs === "update"){
        require_once "views/update.php";

    }
    else
        require_once "views/start.php";

