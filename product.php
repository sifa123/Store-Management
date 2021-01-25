<?php
session_start();


require_once('component.php');
require_once('db.php');

$database = new db("store","product");

if(isset($_POST['add'])){
  

  if(isset($_SESSION['cart'])){
$item_array_id = array_column($_SESSION['cart'], "product_id");


if(in_array($_POST['product_id'],$item_array_id)){
  echo"<script>alert('Product is already in cart')</script>";
  echo"<script>window.location='product.php'</script>";

}else{

$count = count($_SESSION['cart']);
  $item_array=array(
    'product_id'=> $_POST['product_id']
  );

  $_SESSION['cart'][$count] = $item_array;

}

}
else{
  $item_array=array(
    'product_id'=> $_POST['product_id']
  );
$_SESSION['cart'][0]=$item_array;
print_r($_SESSION['cart']);

}
}


?>




<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="product.css">

</head>
<body>


  <header id="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="" class="navbar-brand">
      <h3 class="px-5">
          <a class="navbar-brand" href="index.php" style="text-decoration: none;"><i style="font-size:25px;">Store Management</i></a>
      </h3>
    </a>
        <button type="button" class="navbar-toggler"
                                      data-toggle="collapse"
                                      data-target="#navbarNavAltMarkup"
                                      aria-controls="navbarNavAltMarkup"
                                      aria-expanded="false"
                                      aria-label="Toggle navigation"
        ><span class="navbar-toggler-icon"></span></button>


    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="mr-auto">
      </div>
      <div class="navbar-nav">
        <a href="cart.php" class="nav-item nav-link active">
          <h5 class="px-5 cart">
            <i class="fas fa-shopping-cart"></i>Cart 
            <?php
            if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo"<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";

          }else{
          echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";

        }

            ?>

          </h5>
        </a>
        
      </div>
      
    </div>

  </nav>
  
</header>




   
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      
    </ol>
    <div class="carousel-inner">

      <div class="item active">
      <img src="image1.jpg" style="width:100% height:25%;">
      <div class="carousel-caption">
      </div>
      </div>
       
       <!--div class="item">
      <img src="images/home.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
      </div-->


  
    
   

<div class="jumbotron">
  <div class="container text-center">
    <h1>HAPPY SHOPPING!!!</h1>      
    
  </div>
</div>



<div class="container">
    <div class="row text-center py-5">
      <?php
      $result = $database->getData();
      while ($row = mysqli_fetch_assoc($result)){
      component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
    }
          
      ?>
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

 
</body>
</html>