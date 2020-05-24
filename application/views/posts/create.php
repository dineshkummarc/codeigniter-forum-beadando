<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php
if(isset($view_params)){
  echo $view_params;  
}?>

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <labe>Body</label>
    <textarea class="form-control" id="ckeditor" placeholder="Add Body" name="body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>