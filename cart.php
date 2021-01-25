<?php
session_start();

require_once("db.php");
require_once("component.php");

$db = new db("store", "product");

if(isset($_POST['remove'])){
  if($_GET['action'] == 'remove'){
  foreach($_SESSION ['cart'] as $key=>$value){
  if($value["product_id"] == $_GET['id']){
   unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
}
}
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="product.css">
<style >
  .shopping-cart{
  padding: 3% 0;
}

.cart-items + .cart-items{
  padding: 2% 0;
}
.price-details h6{
  padding: 3% 2%;
}
</style>

</head>
<body class="bg-light">
  <header id="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="" class="navbar-brand">
      <h3 class="px-5">
         <a class="navbar-brand" href="product.php" style="text-decoration: none;"><i style="font-size:25px;">Store Management</i></a>

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


<div class="container-fluid">
  <div class="row px-5">
    <div class="col-md-7">
      <div class="shopping-cart">
        <h6>My Shopping Cart</h6>
        <hr>
        <?php

        $total = 0;

        if(isset($_SESSION['cart'])){
          $product_id = array_column($_SESSION['cart'], 'product_id');

        $result = $db->getData();
        while($row = mysqli_fetch_assoc($result)){
        foreach($product_id as $id){
        if($row['id'] == $id){
        cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);

        $total = $total + (int)$row['product_price'];
      }
      }
      } 
    }else{
    echo"<h5>Your Cart is Empty</h5>";
  }


        ?>

        
      </div>
    </div>
    <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
      
      <div class="pt-4">
        <h6>Price Details</h6>
        <hr>
        <div class="row price-details">
          <div class="col-md-6">
            <?php 
            if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo"<h6>Price($count items)</h6>";
          }else{
          echo"<h6>Price(0 items)</h6>";
        }

            ?>
            <h6>Delivery Charges</h6>
            <hr>
            <h6>Amount Payable</h6>
          </div>
          <div class="col-md-6">
            <h6>tk<?php
             echo $total;
             ?></h6>
             <h6 class="text-success">Free</h6>
             <hr>
             <h6>
              tk<?php echo $total; ?>
             </h6>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  
</div>

  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
