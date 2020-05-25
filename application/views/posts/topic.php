<div class="mb-3">
    <?php $create_link = base_url('posts/create/').$subcategory['id']; ?>

    <h2><?php echo $title.$subcategory['name'].'<a class="btn btn-outline-success float-right" href="'.$create_link.'">Answer</a>'?></h2>
    <small class="post-date">Created on: <?php echo $subcategory['created_at']; ?></small>
    <!-- Edit -->
    <a class="btn btn-outline-warning d-inline-block float-left" href="<?php echo base_url('subcategories/edit/'.$subcategory['id']); ?>">Edit</a>
    
    <!-- Delete -->
    <?php echo form_open('/subcategories/delete/'.$subcategory['id'], 'class="d-inline;"'); ?>
    <input type="submit" value="Delete" class="btn btn-outline-danger">
    <?php echo form_close(); ?>
    <hr>
</div>


<?php if(!empty($posts)) : ?>
<?php foreach($posts as $post) : ?>
    <div class="row mb-2">
        <!-- The Post Body -->
        <div class="col-12">
            <p><?php echo $post['body']; ?></p>
        </div>

        <!-- When and Who wrote this -->
        <div class="col-12">
            <!-- TODO: ide talán a prof képet be lehetne szúrni
            <div class="d-none d-md-block col-md-3">
                
            </div>
            -->
            <small class="post-date">
                    <!-- TODO: Created by: NickName -->
                    Created by: <?php echo "Jon Doe"; ?> </br>
                    Created on: <?php echo $post['created_at']; ?>
            </small>
        </div>

        <!-- Comment and like-->
        <div class="col-12">
            <!-- TODO: -->
                <!-- Comment -->
                <a class="btn btn-outline-info float-left" href="edit/<?php //echo $main_category['id']; ?>">Comment</a>
                <!-- Like -->
                <a class="btn btn-success float-left" href="edit/<?php //echo $main_category['id']; ?>">Like</a>
                <!-- Dislike -->
                <a class="btn btn-danger float-left" href="edit/<?php //echo $main_category['id']; ?>">Dislike</a>
                <!-- Edit -->
                <a class="btn btn-outline-warning d-inline-block float-left" href="edit/<?php //echo $main_category['id']; ?>">Edit</a>
                <!-- Delete -->
                <?php echo form_open('/categories/delete/', 'class="d-inline;"'); ?>
                <input type="submit" value="Delete" class="btn btn-outline-danger">
                <?php echo form_close(); ?>
        </div>
    </div>
    
<?php endforeach; ?>
<?php endif; ?>

