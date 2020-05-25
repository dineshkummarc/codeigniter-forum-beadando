<!-- Kiiírjuk az altéma nevét -->
<h2><strong>Topic Name: </strong><?php echo $subcategory['name']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>

<!-- felsoroljuk a hozzá tartozó postokat-->
<?php foreach($posts as $post) : ?>
        <div class="row">
                <p><?php echo $post['body'];?></p>
                <small class="post-date">Created by: <?php echo "Szerző neve";?></br>
                        Posted on: <?php echo $post['created_at']; ?>
                </small>
        </div>
<?php endforeach; ?>

<hr>
<!--
        <a class="btn btn-outline-warning float-left" href="edit/<?php echo $post['id']; ?>">Edit</a>
        <?php echo form_open('/posts/delete/'.$post['id']); ?>
        <input type="submit" value="Delete" class="btn btn-outline-danger">
        <?php echo form_close(); ?>
-->
