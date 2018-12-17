<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movie</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url (); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css" >
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Movie Databases</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <form class="form-inline" method="post" action="welcome/search">
            <input class="form-control form-control-sm mr-1" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn rounded-30 btn-outline-success btn-sm" type="submit">Search</button>
          </form>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url() ?>welcome/index">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>welcome/upcome">Upcoming</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url()?>welcome/fav">My Favorites</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="my-4">Search Result
        <small>"<?= $q ?>"</small>
      </h1>
                    <!-- Isi Content -->
      <div class="row"> 
      <?= $hasil ?>
      </div>
      <!-- Pagination -->
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>