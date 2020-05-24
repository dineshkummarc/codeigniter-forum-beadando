<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <h3><?php echo $post['title']; ?></h3>
    <small class="post-date">Posted on: <?php echo $post['created_at']; ?></br></small>
    <?php echo word_limiter($post['body'], $number_of_words); ?>
    </br></br>
    <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['id']); ?>">Read More</a></p>
<?php endforeach; ?>