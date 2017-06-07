<?php
/* @var Controller $this */
require "header.php";
?>
<div class="row">
    <div class="col-lg-6 col-sm-12">
    <h2>Directors</h2>
    <table class="table-striped">
        <tr>
            <th>Name</th>
            <th>Birth-year</th>
            <th>Nationality</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Info</th>
        </tr>
        <?php
        foreach ($this->db->readAll('director') as $value):
        ?>
            <tr>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['birth_year']; ?></td>
                <td><?php echo $value['nationality'];?></td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=update_director&id=<?php echo $value['id']; ?>">Update</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=delete_director&id=<?php echo $value['id']; ?>">Delete</a>
                </td>
                <td>
                    <a class="btn btn-default" href="/index.php?page=show_movies&id=<?php echo $value['id']; ?>">Info</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    </div>
</div>

<?php
require "footer.php";
?>