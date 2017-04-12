<?php 
// require "../model/productsModel.php";
include "header.php";
?>

<form action="../index.php" method="post">
	<div class="form-group">
		<label>Title: </label>
		<input type="text" name="title" class="form-control" id="title" required>
	</div>
	<div class="form-group">
		<label>Alternative titel: </label>
		<input type="text" name="altTitle" class="form-control" id="altTitle">
	</div>
	<div class="form-group">
		<label>Director: </label>
		<input type="text" name="director" class="form-control" id="director" required>
	</div>
	<div class="form-group">
		<label>Country: </label>
		<input type="text" name="country" class="form-control" id="country" required>
	</div>
	<div class="form-group">
		<label>Year: </label>
		<input type="year" name="year" class="form-control" id="year" required>
	</div>
	<button type="submit" class="btn btn-default" name="insert">Insert new movie</button>
</form>

<?php
include "footer.php";
?>