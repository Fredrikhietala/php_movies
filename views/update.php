<?php 
require "../model/productsModel.php";
include "header.php";
$update = new MoviesCrud($connection);
$updateMovie = new Movies();
$updateMovie = $update->getById($_REQUEST['edit_id']);
var_dump($updateMovie = $update->getById($_REQUEST['edit_id']));
echo "<br>";
var_dump($updateMovie->getTitle('edit_id'));
?>

<form action="../index.php" method="post">
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