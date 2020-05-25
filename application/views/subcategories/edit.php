<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<!-- when the form action is empty, then the form submits to itself!!! -->
<?php echo form_open(); ?>
<!--<input type="hidden" name="id" value="<?php echo $subcategories['id']; ?>"> -->
  <div class="form-group">
    <?php echo form_label('Name', 'name')?>
    <?php echo form_input('name', set_value('name', $subcategory['name']), ['id' => 'name', 'placeholder' => 'Add Name', 'class' => 'form-control']); ?>
    <!--<input type="text" class="form-control" name="name" placeholder="Add Name" value="<?php echo $subcategories['name']; ?>">-->
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>