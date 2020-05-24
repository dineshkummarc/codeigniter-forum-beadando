<h2><?php echo $main_category['name']; ?></h2>
<small class="post-date">Created on: <?php echo $main_category['created_at']; ?></small>
<div class="post-body">
    <?php echo $main_category['description'];?>
</div>

<!-- TODO: if admin show else hide -->
<a class="btn btn-outline-warning float-left" href="edit/<?php echo $main_category['id']; ?>">Edit</a>
<?php echo form_open('/categories/delete/'.$main_category['id']); ?>
<input type="submit" value="Delete" class="btn btn-outline-danger">
<?php echo form_close(); ?>

<hr>

<!-- TODO: list sub categories -->
<ul>
    <li>sub category1</li>
    <li>sub category2</li>
</ul>


