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
<div>
    <h3>Sub Categories</h3>
    <?php echo validation_errors(); ?>
    <!-- Insert sub categories -->
    <?php echo form_open_multipart('/categories/create_subcategory/'.$main_category['id']); ?>
    <div class="form-group">
        <div class="row">
            <input  type="text" class="form-control col-md-9 mr-5" name="name" placeholder="Add Subcategory Name">
            <input type="submit" name="submit" value="Submit" class="btn btn-outline-success col-md-2"/>
        </div>
    </div>
    <?php echo form_close();?>
    
    <!-- List the subcategories -->
    <?php if(!empty($sub_category)) : ?>
        <ul>
            <?php foreach($sub_category as $sub_category) : ?>
                <?php $link = base_url().'subcategories/'.$sub_category['id']; ?>
                <li>
                    <a href="<?php echo $link; ?>"><?php echo $sub_category['name']; echo " (number of comments)"; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>


