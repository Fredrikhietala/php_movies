<?php 
require "../model/productsModel.php";
//include "header.php";


?>

<form action="update.php" method="post">
	<div class="form-group">
		<label>Titel: </label>
		<input type="text" name="title" class="form-control" id="title" value="<?php $title ?>">
	</div>
	<div class="form-group">
		<label>Svensk titel: </label>
		<input type="text" name="swedishTitle" class="form-control" id="swedishTitle" value="<?php $swedishTitle ?>">
	</div>
	<div class="form-group">
		<label>Regissör: </label>
		<input type="text" name="director" class="form-control" id="director" value="<?php $director ?>">
	</div>
	<div class="form-group">
		<label>Land: </label>
		<input type="text" name="country" class="form-control" id="country" value="<?php $country ?>">
	</div>
	<div class="form-group">
		<label>År: </label>
		<input type="year" name="year" class="form-control" id="year" value="<?php $year ?>">
	</div>
	<button type="submit" class="btn btn-default" name="btn-update">Uppdatera</button>
</form>