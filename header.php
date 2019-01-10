<!DOCTYPE html>
<?php
   include 'connection.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Qasim Store</title>
    <!-- Bootstrap -->
    <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
	<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <style type="text/css">
      @media all {
    /* Your code here */

      table{
        border:1px solid black;
      }
      td,th{
        border:1px solid black;
      
          word-break: break-all;

      }
      
      .fixed{
        top: 60px;
        position: fixed;
      
      }
      .nfixed{
        top: 0px;
        position: fixed;
        width: 100%;
        z-index: 1;
      }
      .formsfixed{
        top: 60px;
        position: fixed;
        width: 500px;      
        
      }
}    
    </style>
    <!-- <script src="js/bootstrap.js"></script> -->
	<link rel="stylesheet" type="text/css" href="css/cs.css">
    <script type="text/javascript">
		
	</script>
  <script>
              new WOW().init();
              </script>

  <!-- <script type="text/javascript" src="js/main.js"></script> -->
</head>
  <body >
	<div class="container" style="">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <img src="img/logo.png" class="img-responsive wow rubberBand" data-wow-delay="0.5s">
            </div>  
        </div>   
    </div> <nav class="navbar navbar-inverse wow fadeIn" id="nbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">GlowingNeonIndustry</a>
    </div>
    <div class="collapse navbar-collapse pull-right"  id="myNavbar">
      <ul class="nav navbar-nav">
                <li class="hvr-overline-from-center" id="addSale"><a href="addSale.php">AddSale</a></li>
                <li class="hvr-overline-from-center" id="addPurchase"><a href="addPurchase.php">AddPurchase</a></li>
                <li class="hvr-overline-from-center" id="addWork"><a href="addWork.php">Addwork</a></li>
                <li class="hvr-overline-from-center"><a href="chekout.php">Checkout</a></li>
                <li class="hvr-overline-from-center"><a href="addSale.php">Profile</a></li>

              </ul>
    </div>
  </div>
</nav> 
    <!-- <nav class="navbar navbar-inverse" id="nbar" style="">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
              Glowing Neon Industry
          </a>
        </div>
        <ul class="nav navbar-nav pull-right">
          <li class="qasim" id="addSale" ><a href="addSale.php">AddSale</a></li>
          <li class="" id="addPurchase"><a href="addPurchase.php">AddPurchase</a></li>
          <li class="" id="addWork"><a href="addWork.php">AddWork</a></li>
          <li class="" id="checkout"><a href="checkout.php">CheckOut</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Setting</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
      </ul>
      </div>
    </nav> -->
	