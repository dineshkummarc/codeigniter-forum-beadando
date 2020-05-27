<h2>Category Name: </br><?php echo $title; ?></h2>
<div class="post-body">
    <h4>Description</h4>
    <?php echo $main_category['description'];?>
    <small class="post-date">Created on: <?php echo $main_category['created_at']; ?></small>
</div>

<!-- if admin show else hide -->
<?php if($this->session->userdata('user_id') == ADMIN_ID) : ?>
    <a class="btn btn-outline-warning float-left" href="edit/<?php echo $main_category['id']; ?>">Edit</a>
    <?php echo form_open('/categories/delete/'.$main_category['id']); ?>
    <input type="submit" value="Delete" class="btn btn-outline-danger">
    <?php echo form_close(); ?>
<?php endif; ?>

<hr>

<!-- TODO: list sub categories -->
<div>
    <h3>Topics</h3>
    <?php echo validation_errors(); ?>
    <!-- Insert sub categories -->
    <?php echo form_open_multipart('/categories/create_subcategory/'.$main_category['id']); ?>
    <div class="form-group">
        <div class="row">
            <input  type="text" class="form-control col-md-9 mr-5" name="name" placeholder="Add Topic Name" required>
            <input type="submit" name="submit" value="Submit" class="btn btn-outline-success col-md-2"/>
        </div>
    </div>
    <?php echo form_close();?>
    
    <!-- List the subcategories -->
    <?php if(!empty($sub_category)) : ?>
        <ul>
            <?php foreach($sub_category as $sub_category) : ?>
                <!-- 
                    az altémára kattintva átnavigál a post/$id oldalra
                    ahol felül fel van tüntetve a sub_category['id']['name']
                    alatta pedig a hozzá tartozó postok idő szerint ASC
                -->
                <?php $link = base_url().'posts/topic/'.$sub_category['id']; ?>
                <li>
                    <a href="<?php echo $link; ?>"><?php echo $sub_category['name']; echo " (number of comments)"; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>


