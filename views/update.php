<?php 
require "../model/productsModel.php";
include "header.php";
$update = new MoviesCrud($connection);
$updateMovie = new Movies($connection);
$updateMovie = $update->getById($_REQUEST['edit_id']);
//var_dump($updateMovie = $update->getById($_REQUEST['edit_id']));
//var_dump($updateMovie->getTitle('edit_id'));

if (isset($_POST['btn-update'])) {
    $id = $this->updateMovie->getId();
    $title = $this->updateMovie->setTitle($_POST['title']);
    $altTitle = $this->updateMovie->setAltTitle($_POST['altTitle']);
    $director = $this->updateMovie->setDirector($_POST['director']);
    $country = $this->updateMovie->setCountry($_POST['country']);
    $year = $this->updateMovie->setYear($_POST['year']);

    if ($movies = $update->update($id, $title, $altTitle, $director, $country, $year)) {
        echo "<p>Record was successfully updated</p>";
        header("Location: index.php");
        //include "views/show.php";
    }
    else {
        echo "Error";
        header("Location: ../views/update.php");
        //include "views/show.php";
    }
}
?>

<form action="update.php" method="post">
	<div class="form-group">
		<label for="title">Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php echo $updateMovie->getTitle(); ?>" required>
	</div>
	<div class="form-group">
		<label for="altTitle">Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle" value="<?php echo $updateMovie->getAltTitle(); ?>">
	</div>
	<div class="form-group">
		<label for="director">Director: </label>
		<input type="text" name="director" class="form-control" id="director" value="<?php echo $updateMovie->getDirector(); ?>" required>
	</div>
	<div class="form-group">
		<label for="country">Country: </label>
		<input type="text" name="country" class="form-control" id="country" value="<?php echo $updateMovie->getCountry(); ?>" required>
	</div>
	<div class="form-group">
		<label for="year">Year: </label>
		<input type="text" name="year" class="form-control" id="year" value="<?php echo $updateMovie->getYear(); ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php
include "footer.php";
?>