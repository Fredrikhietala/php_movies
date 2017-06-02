<?php
require "header.php";
?>

<form action="/index.php?page=create_director" method="post">
    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="birth_year">Birth-year: </label>
        <input type="text" name="birth_year" class="form-control" id="birth_year" placeholder="Birth-year" required>
    </div>
    <button type="submit" class="btn btn-default" name="insert" id="insert">Insert new director</button>
</form>

<?php
require "footer.php";
?>
