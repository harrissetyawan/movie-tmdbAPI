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
    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" >
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

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo base_url() ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>welcome/upcome">Upcoming</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">My Favorites</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="my-4 ml-5" style="text-align:center;">Your Favorite
        <small>movies</small>
      </h1>
    <!-- Page Content -->
    <div class="container">
                    <!-- Isi Content -->
                    <div class="row">
       <?php 
       		foreach ($idmovie as $id) {
            # code...
          $content = file_get_contents('https://api.themoviedb.org/3/movie/'.$id->mov_id.'?api_key='.$apikey.'&language=en-US');
          $result = json_decode($content);
          $output = '
                <div class="col-sm-3">
                  <div class="card" style="width:200px; height:450px;">
                    <div class="card-body">
                    <img class="card-img-top" src="http://image.tmdb.org/t/p/w185'.$result->poster_path.'" alt="Card image Cap" style="width:100%">
                        <h4 class="card-title font-weight-bold text-light" style="text-align:center;">'.$result->title.'</h4>   
                      </div>
                      
                      <a href="detail?id='.$result->id.'" role="button" class="btn btn-outline-dark btn-sm mb-1">Detail</a>
                      <a href="del?id='.$result->id.'" class="btn btn-outline-danger btn-sm">Remove</a>
                  </div>
                </div>
                ';
                echo $output;
        }

       ?>       
       </div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>