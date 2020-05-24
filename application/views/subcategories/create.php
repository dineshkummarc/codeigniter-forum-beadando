<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('subcategories/create'); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Add Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>