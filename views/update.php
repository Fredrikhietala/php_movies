<?php 
require "../model/productsModel.php";
include "header.php";
$update = new MoviesCrud($connection);
$updateMovie = new Movies();
$updateMovie = $update->getById($_REQUEST['edit_id']);
var_dump($updateMovie = $update->getById($_REQUEST['edit_id']));
?>

<form action="../index.php" method="post">
	<div class="form-group">
		<label>Title: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php $updateMovie->getTitle($_REQUEST['title']); ?>" required>
	</div>
	<div class="form-group">
		<label>Alternative title: </label>
		<input type="text" name="altTitle" class="form-control" id="swedishTitle" value="<?php $updateMovie->getAltTitle(); ?>">
	</div>
	<div class="form-group">
		<label>Director: </label>
		<input type="text" name="director" class="form-control" id="director" value="<?php $updateMovie->getDirector(); ?>" required>
	</div>
	<div class="form-group">
		<label>Country: </label>
		<input type="text" name="country" class="form-control" id="country" value="<?php $updateMovie->getCountry(); ?>" required>
	</div>
	<div class="form-group">
		<label>Year: </label>
		<input type="year" name="year" class="form-control" id="year" value="<?php $updateMovie->getYear(); ?>" required>
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Update</button>
</form>

<?php 
include "footer.php";
?>