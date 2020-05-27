<html>
    <head>
        <title>CI Forum</title>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!-- Link Bootswatch Sketchy Theme CSS and JS-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootswatch-sketchy-theme.min.css'); ?>" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- CKEditor -->
        <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js" charset="utf-8"></script>
        <!-- Link custom CSS -->
        <link href="<?php echo base_url('assets/css/style.css').'?'.time();?>" rel="stylesheet" type="text/css" >
        <!-- Link custom.js -->
        <script src="<?php echo base_url('assets/js/custom.js').'?'.time();?>"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Codeigniter Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>posts">Latest Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
            </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <?php if(!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('users/login'); ?>">Log In</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('users/register'); ?>">Register<span class="sr-only">(current)</span></a>
                    </li>
                <?php endif; ?>
                
                <?php if($this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('users/logout'); ?>">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        </nav>

        <div class="container">
            <!-- Flash messages -->
            <!-- Permission Denied -->
            <?php if($this->session->flashdata('permission_denied')) : ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('permission_denied').'</p>'; ?>
            <?php endif; ?>
            <!-- Registered -->
            <?php if($this->session->flashdata('user_registered')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
            <?php endif; ?>
            <!-- Logged in -->
            <?php if($this->session->flashdata('user_login')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_login').'</p>'; ?>
            <?php endif; ?>
            <!-- login_failed -->
            <?php if($this->session->flashdata('login_failed')) : ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
            <?php endif; ?>
            <!-- Logged out -->
            <?php if($this->session->flashdata('user_loggedout')) : ?>
                <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
            <?php endif; ?>

            <!-- Posts -->
            <?php if($this->session->flashdata('post_created')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_updated')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('post_deleted')) : ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; ?>
            <?php endif; ?>
            
            <!-- Categories -->
            <?php if($this->session->flashdata('category_created')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('category_updated')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_updated').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('category_deleted')) : ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted').'</p>'; ?>
            <?php endif; ?>

            <!-- Subcategories -->
            <?php if($this->session->flashdata('subcategory_created')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('subcategory_created').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('subcategory_updated')) : ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('subcategory_updated').'</p>'; ?>
            <?php endif; ?>

            <?php if($this->session->flashdata('subcategory_deleted')) : ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('subcategory_deleted').'</p>'; ?>
            <?php endif; ?>

