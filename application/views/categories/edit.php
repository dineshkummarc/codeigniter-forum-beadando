<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('categories/update'); ?>
<input type="hidden" name="id" value="<?php echo $categories['id']; ?>">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" placeholder="Add Name" value="<?php echo $categories['name']; ?>">
  </div>
  <div class="form-group">
    <labe>Description</label>
    <textarea class="form-control" id="ckeditor" placeholder="Add Description" name="description"><?php echo $categories['description']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>