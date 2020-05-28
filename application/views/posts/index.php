<h2><?= $title ?></h2>
<?php foreach($posts as $post) : ?>
    <div>
        <?php echo word_limiter($post['body'], $number_of_words); ?>
        <!-- FIXME: readmore -->
        <strong>READ MORE DOESNT WORK</strong>
        <p><a class="btn btn-default" href="<?php echo site_url('posts/'.$post['id']); ?>">Read More</a></p>
        <small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
    </div>
<?php endforeach; ?>
<div class="pagination-links">
    <?php echo $this->pagination->create_links(); ?>
</div>