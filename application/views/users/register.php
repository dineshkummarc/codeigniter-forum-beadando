<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="First name">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Last name">
    </div>
    <div class="form-group">
        <label>E-mail address:</label>
        <input type="email" class="form-control" name="email" placeholder="sample@sample.com">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>