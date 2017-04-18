<?php 
require "../model/productsModel.php";
require "header.php";
$update = new MoviesCrud($connection);
$editMovie = new Movies($connection);
$editMovie = $update->getById($_REQUEST['edit_id']);
$updateMovie = new Movies($connection);
//var_dump($id = $_REQUEST['id']);

if (isset($_POST['btn-update'])) {
    $id = $_REQUEST['id'];
    $title = $_POST['title'];
    $updateMovie->setTitle($title);
    $altTitle = $_POST['altTitle'];
    $updateMovie->setAltTitle($altTitle);
    $director = $_POST['director'];
    $updateMovie->setDirector($director);
    $country = $_POST['country'];
    $updateMovie->setCountry($country);
    $year = $_POST['year'];
    $updateMovie->setYear($year);

    if ($movies = $update->update($id, $title, $altTitle, $director, $country, $year)) {
        echo "<p>Record was successfully updated</p>";
        header("Location: ../index.php");
    }
    else {
        echo "Error";
        header("Location: ../views/update.php");
    }
}
?>

<form action="update.php" method="post">
	<div class="form-group">
        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $editMovie->getId(); ?>" readonly>
    </div>
    <div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php echo $editMovie->getTitle(); ?>" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle" value="<?php echo $editMovie->getAltTitle(); ?>">
	</div>
	<div class="form-group">
		<label for="director">Director: </label>
		<input type="text" name="director" class="form-control" id="director" value="<?php echo $editMovie->getDirector(); ?>" required>
	</div>
	<div class="form-group">
		<label for="country">Country: </label>
		<input type="text" name="country" class="form-control" id="country" value="<?php echo $editMovie->getCountry(); ?>" required>
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" value="<?php echo $editMovie->getYear(); ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php
include "footer.php";
?>