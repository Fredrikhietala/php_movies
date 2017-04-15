<?php 
require "../model/productsModel.php";
include "header.php";

$insert = new MoviesCrud($connection);
//$insertMovie = new Movies();

if (isset($_POST['insert'])) {
    $array = $movie->setTitle($_POST['title']);
    $array = $movie->setAltTitle($_POST['altTitle']);
    $array = $movie->setDirector($_POST['director']);
    $array = $movie->setCountry($_POST['country']);
    $array = $movie->setYear($_POST['year']);

    if ($movies = $insert->create($array)) {
        echo "<div class='alert alert-success'>Movie was inserted</div>";
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'>Unable to insert product</div>";
        header("Location: ../views/create.php");
    }
}

?>

<form action="create.php" method="post">
	<div class="form-group">
		<label for="title">Title: </label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative titel: </label>
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