<?php 
require "../model/productsModel.php";
include "header.php";
?>

<form>
	<div class="form-group">
		<label>Titel: </label>
		<input type="text" name="title" class="form-control" id="title" required>
	</div>
	<div class="form-group">
		<label>Svensk titel: </label>
		<input type="text" name="swedishTitle" class="form-control" id="swedishTitle">
	</div>
	<div class="form-group">
		<label>Regissör: </label>
		<input type="text" name="director" class="form-control" id="director" required>
	</div>
	<div class="form-group">
		<label>Land: </label>
		<input type="text" name="country" class="form-control" id="country" required>
	</div>
	<div class="form-group">
		<label>År: </label>
		<input type="year" name="year" class="form-control" id="year" required>
	</div>
	<button type="submit" class="btn btn-default">Uppdatera</button>
</form>