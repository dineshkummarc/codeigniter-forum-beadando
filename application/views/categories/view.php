<h2>Category Name: </br><?php echo $title; ?></h2>
<small class="post-date">Created on: <?php echo $main_category['created_at']; ?></small>
<div class="post-body">
    <h4>Description</h4>
    <?php echo $main_category['description'];?>
</div>

<!-- TODO: if admin show else hide -->
<a class="btn btn-outline-warning float-left" href="edit/<?php echo $main_category['id']; ?>">Edit</a>
<?php echo form_open('/categories/delete/'.$main_category['id']); ?>
<input type="submit" value="Delete" class="btn btn-outline-danger">
<?php echo form_close(); ?>

<hr>

<!-- TODO: list sub categories -->
<h3>Sub Categories</h3>
<?php var_dump($sub_categories);?>
<?php if(!empty($sub_categories)) : ?>
    <ul>
        <?php foreach($sub_categories as $sub_category) : ?>
            <li><a href=""><?php echo $sub_category['name'];?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


