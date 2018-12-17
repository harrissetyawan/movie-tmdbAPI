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
    <link rel="stylesheet" type="text/css" href="<?= base_url ();?>assets/css/detail.css" >
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
  </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url();?>">Movie Databases</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url();?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url();?>welcome/upcome">Upcoming</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url();?>welcome/fav">My Favorites</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content -->
    <div class="bg">
  <img src="http://image.tmdb.org/t/p/w185<?= $backdrop?>" alt="background">
</div>
    <div class="container">
		<div class="card" >
    
			<div class="container-fluid">
      <div class="card-body float-left" style="">
      <img src="http://image.tmdb.org/t/p/w185<?= $poster?>"  class="img rounded" alt="image" style="filter:blur(0.1px);-webkit-box-shadow: 0px 1px 6px 5px rgba(82,122,98,1); -moz-box-shadow: 0px 1px 6px 5px rgba(82,122,98,1); box-shadow: 0px 1px 6px 5px rgba(82,122,98,1);">
      <div class="row">
      <a href="<?= base_url();?>welcome/insertdb?id=<?= $id ?>" class="btn btn-outline-success font-weight-bold mt-3" style="margin-left:50px; color:black; text-transform:uppercase; ">Add To Favorite</a>
      </div>
      </div>
          <div class="details col-md-6">
						<h3 class="product-title" style="font-size:30px; color:black; text-shadow:1px 1px 1px #BDB76B;"><?= $title?></h3>
            <div class="row mb-3 ml-3">
            <?= $genre?>
            </div>
            <h5 class="font-weight-bold mb-4" style=""><kbd><?= $duration?></kbd> min  <span class="vl ml-1" style="margin-bottom:-2px;padding-right:4px;font-size:30px; padding-left:5px;">|</span> <?= $release?></h5>
            
						<p class="product-description" style="font-size:18px; color:black; text-shadow: 0.1px 0.1px #228B22;"><?= $overview ?></p>
						<h4 class="status font-weight-bold" style="color:black; text-shadow: 0.1px 0.1px 0.1px red; text-transform: uppercase;"><?= $status ?> !</h4>
						<a href="<?= $web?>"class="status" style="font-size:17px; color:black; text-shadow:0.1px 0.1px 0.1px blue;"><?= $web?></a>

					</div>
		
			</div>
    </div>
    <br>
  <div class="card bg-light text-black" style="margin-top:-16px;">
    <div class="card-body">
      <h2 style="text-align:center; margin-top:-42px;"> More Details </h2>
      
      <hr class="style" style="border-top:3px double #8c8b8b;">
      <div class="row">
        <h4 class="font-weight-bold  ml-4 mr-1 mb-1">Production Budget  :  </h4>
          <kbd class="p" style="height:26px;">$<?= $duit?></kbd>
      </div>
      <div class="row">
        <h4 class="font-weight-bold ml-4 mr-1 mb-1 mt-3">Revenue  :  </h4>
          <kbd class="p mt-3 mr-1 ml-1" style="height:26px; ">$<?= $roi?></kbd>
      </div>
      <div class="row">
        <h4 class="font-weight-bold ml-4 mt-3">Countries  :</h4>
          <?= $country?>
      </div>
      <div class="row">
        <h4 class="font-weight-bold ml-4 mt-3">Tagline :</h4>
        <kbd class="p font-italic mt-3 mr-1 ml-1" style="height:26px; ">"<?= $tagline?>"</kbd>
      </div>
      <hr>
      <div class="row">
        <h4 class="font-weight-bold  ml-4 mr-1 mb-1">Popularity  :  </h4>
          <kbd class="p" style="height:26px;"><?= $populer?></kbd>
      </div>
      <div class="row">
        <h4 class="font-weight-bold  ml-4 mr-1 mb-1 mt-3">Vote Average  :  </h4>
          <kbd class="p mt-3 mb-4" style="height:26px;"><?= $vote?></kbd>
      </div>
      <div class="d-flex">
        <hr class="my-auto flex-grow-1">
        <h4 class="px-4 font-weight-bold">Company Credits</h4>
        <hr class="my-auto flex-grow-1">
      </div>
      <center>
      <div class="row">
      <?= $co ?>
      </div>
      </center>
    </div>
  </div>
</div>

    <!-- /.container -->

  </body>

</html>