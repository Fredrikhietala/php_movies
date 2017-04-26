<?php
require "model/dbConnect.php";
require "model/MovieCrud.php";
require "model/Movie.php";

$movieCrud = new MovieCrud($connection);
$movie = new Movie($connection);

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($page) {
    case 'show':
        if (isset($_POST['btn-delete'])){
            $id = $_POST['delete'];
            $movie = $movieCrud->delete($id);
        }
        else {
            $movie = $movieCrud->readAll();
            require_once "views/show.php";
        }
    break;

    case 'create':
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
            require_once "views/create.php";

            if ($movies = $movieCrud->create($title, $altTitle, $director, $country, $year)) {
                echo "<div class='alert alert-success'>Movie was inserted</div>";
                //header("Location: index.php?page=show");
            } else {
                echo "<div class='alert alert-danger'>Unable to insert movie</div>";
                //header("Location: index.php?page=create");
            }
        }
    break;

    case 'update':
        if (isset($_POST['btn-edit'])) {
            $id = $_POST['edit'];
            $movie = $movieCrud->getById($id);
        }
        if (isset($_POST['btn-update'])) {
            $id = $_POST['id'];
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
            require_once "views/update.php";

            if ($movies = $movieCrud->update($id, $title, $altTitle, $director, $country, $year)) {
                echo "<p>Movie was successfully updated</p>";
                //header("Location: index.php?page=show");
            }
            else {
                echo "<div class='alert alert-danger'>Unable to update movie</div>";
                //header("Location: index.php?page=update");
            }
        }
    break;
    default :
        require_once "views/start.php";
    break;
}
