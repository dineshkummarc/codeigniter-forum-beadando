<h2><?= $title ?></h2>
<?php foreach($categories as $category) : ?>
    <div>
        <h3><?php echo $category['name']; ?></h3>
        <small class="post-date">Created on: <?php echo $category['created_at']; ?></br></small>
        <?php echo $category['description']; ?>
        <p><a class="btn btn-default" href="<?php echo site_url('/categories/'.$category['id']); ?>">Show Sub Categories</a></p>
    </div>
<?php endforeach; ?>

