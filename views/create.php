<?php 
require "../model/productsModel.php";
require "header.php";

$insert = new MoviesCrud($connection);
$insertMovie = new Movies($connection);


if (isset($_POST['insert'])) {
    $title = $_POST['title'];
    $insertMovie->setTitle($title);
    $altTitle = $_POST['altTitle'];
    $insertMovie->setAltTitle($altTitle);
    $director = $_POST['director'];
    $insertMovie->setDirector($director);
    $country = $_POST['country'];
    $insertMovie->setCountry($country);
    $year = $_POST['year'];
    $insertMovie->setYear($year);

    if ($movies = $insert->create($title, $altTitle, $director, $country, $year)) {
        echo "<div class='alert alert-success'>Movie was inserted</div>";
        header("Location: ../index.php");
    } else {
        echo "<div class='alert alert-danger'>Unable to insert movie</div>";
        header("Location: ../views/create.php");
    }
}

//Fatal error: Uncaught Error: Call to a member function getTitle() on string in C:\MAMP\htdocs\php_movies\model\productsModel.php:47 Stack trace: #0 C:\MAMP\htdocs\php_movies\views\create.php(15): MoviesCrud->create('Stand By Me', '', 'Rob Reiner', 'USA', '1986') #1 {main} thrown in C:\MAMP\htdocs\php_movies\model\productsModel.php on line 47
//Fatal error: Uncaught Error: Call to a member function setTitle() on null in C:\MAMP\htdocs\php_movies\views\create.php:9 Stack trace: #0 {main} thrown in C:\MAMP\htdocs\php_movies\views\create.php on line 9

?>

<form action="create.php" method="post">
	<div class="form-group">
		<label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle" placeholder="Alternative titel">
	</div>
	<div class="form-group">
		<label for="director">Director: </label>
		<input type="text" name="director" class="form-control" id="director" placeholder="Director" required>
	</div>
	<div class="form-group">
		<label for="country">Country: </label>
		<input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" placeholder="Year" required>
	</div>
	<button type="submit" class="btn btn-default" name="insert" id="insert">Insert new movie</button>
</form>

<?php
include "footer.php";
?>