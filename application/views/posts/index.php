<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <!-- FIXME: <h3><?php echo $post['title']; ?></h3> -->
    <small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small>
    <?php echo word_limiter($post['body'], $number_of_words); ?>
    </br></br>
    <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['id']); ?>">Read More</a></p>
<?php endforeach; ?>