<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Add Name">
  </div>

  <div class="form-group">
    <labe>Description</label>
    <textarea class="form-control"  id="ckeditor" placeholder="Add Description" name="description"></textarea>
  </div>

  <div class="form-group">
    <labe>Upload Image</label>
    <input type="file" name="categoryimage" size="20">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>