<?php
require "model/dbConnect.php";
require "model/movieModel.php";
require "model/Movie.php";

$obj = new MoviesCrud($connection);
$movie = new Movie($connection);

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($page)) {
        require_once "views/start.php";
    }
    elseif ($page === "show") {
        $movie = $obj->readAll();
        require_once "views/show.php";
        if (isset($_POST['btn-delete'])) {
            $id = $_POST['delete'];
            $movie = $obj->delete($id);
            header("Location: index.php?page=show");
        }
    }
    elseif ($page === "create") {
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
    elseif ($page === "update") {
        if (isset($_POST['btn-edit'])) {
            $id = $_POST['edit'];
            $movie = $obj->getById($id);
        }
        require_once "views/update.php";
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

            if ($movies = $obj->update($id, $title, $altTitle, $director, $country, $year)) {
                echo "<p>Record was successfully updated</p>";
                header("Location: index.php?page=show");
            }
            else {
                echo "Error";
                header("Location: index.php?page=update");
            }
        }
    }
    else
        require_once "views/start.php";

