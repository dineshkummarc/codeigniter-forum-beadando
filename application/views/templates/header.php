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
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Sign In <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>posts">Sign Up</a>
                </li>
            </ul>
        </div>
        </nav>

        <div class="container">
