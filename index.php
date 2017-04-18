<?php 
require "model/productsModel.php";
//global $movie;
$obj = new MoviesCrud($connection);
$movie = new Movies($connection);


if (!empty($movie)) {
    $movie = $obj->readAll();
    require "views/show.php";

    if (isset($_POST['btn-delete'])) {
        $id = $_REQUEST['delete'];
        $movie = $obj->delete($id);
        header("Location: index.php");
    }
}

if (isset($_POST['btn-create'])) {

    if (isset($_POST['insert'])) {
        require "views/create.php";
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
        var_dump($movies = $obj->create($title, $altTitle, $director, $country, $year));

        if ($movies = $obj->create($title, $altTitle, $director, $country, $year)) {
            echo "<div class='alert alert-success'>Movie was inserted</div>";
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Unable to insert movie</div>";
            header("Location: views/create.php");
        }
    }
}