<?php
/* @var Database $db */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
    <h2>Movies by director</h2>
    <table class="table-striped">
        <tr>
            <th>Director</th>
            <th>Birth-year</th>
            <th>Nationality</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        /* @var Model $id */
        $this->db->getById('director', $id);
            /* @var Controller $director */
        ?>
            <tr class="show_director">
                <td><?php echo $director['name']; ?></td>
                <td><?php echo $director['birth_year']; ?></td>
                <td><?php echo $director['nationality']; ?> </td>
                <td></td>
                <td></td>
            </tr>
        <tr>
            <th>Title</th>
            <th>Alternative Title</th>
            <th>Year</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        /* @var Model $id */
        foreach ($this->db->readMovies('films', $id) as $value):
            ?>
            <tr>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['alt_title']; ?></td>
                <td><?php echo $value['year']; ?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update_movie&id=<?php echo $value['id']; ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=delete_movie&id=<?php echo $value['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>
<br>
<a class="btn btn-default" href="/index.php?page=show">Back</a>
