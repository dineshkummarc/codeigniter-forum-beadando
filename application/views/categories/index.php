<h2><?= $title ?></h2>
<?php foreach($categories as $category) : ?>
    <div>
        <h3><?php echo $category['name']; ?></h3>
        <small class="post-date">Created on: <?php echo $category['created_at']; ?></br></small>
        <div class="row">
            <div class="col-md-3">
                <img class="category-thumb" src="<?php echo site_url(); ?>assets/images/categories/<?php echo $category['photo']; ?>" alt="">
            </div>
            <div class="col-md-9">
                <?php echo $category['description']; ?>
            </div>
        </div>
        <p><a class="btn btn-outline-info" href="<?php echo site_url('/categories/'.$category['id']); ?>">Show Sub Categories</a></p>
    </div>
<?php endforeach; ?>

