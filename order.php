<?php
    $servername ="localhost";
  $username ="root";
  $password ="";
  $databasename ="store";
    $con = new mysqli($servername, $username, $password, $databasename);
    

    $errors=array();
        
        if(isset($_POST['product'])){
            $product_name=$_POST['ppname'];
            $product_price=$_POST['ppprice'];
            $delivery_charge=$_POST['pdcharge'];
            $total_price=$_POST['ptprice'];
            
            $sql = mysqli_query($con, "INSERT INTO `product`(`Product_Name`, `Product_Price`, `Delivery_Charge`, `Total_Price`) VALUES ('$product_name','$product_price','$delivery_charge','$total_price')");
           
            header('Location: us_login.php');

            }
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <title></title>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  

</head>
<body>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <a class="navbar-brand" href="index.php" style="text-decoration: none;"><i style="font-size:25px;">Store Management</i></a>
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <a class="navbar-brand" href="product.php" style="text-decoration: none;"><i style="font-size:25px;">Product</i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
    <ul class="navbar-nav ml-auto">
      

      
     
    </ul>
   
  </div>
</nav>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 mb-5">
      <h2 class="text-center p-2 text-primary">Fill the blank fields for your successfull order</h2>
      <h3>Product Details:</h3>
      <table class="table table-bordered" width="500px">
        <tr>
          <th>Product Name:</th>
          <td></td>
        </tr>
        <tr>
          <th>Product Price:</th>
          <td></td>

        </tr>
        <tr>
          <th>Delivery Charge:</th>
          <td></td>
        </tr>
        <tr>
          <th>Total Price:</th>
          <td></td>
        </tr>
      </table>
      <h4>Enter Your Details:</h4>
      <form action="pay.php" method="post" accept-charset="utf-8">
        <input type="hidden" name="product_name" value="">
         <input type="hidden" name="product_price" value="">
         <div class="form-group">
           <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
         </div>
         <div class="form-group">
           <input type="email" name="email" class="form-control" placeholder="Enter your e-mail" required>
         </div>
         <div class="form-group">
           <input type="tel" name="phone" class="form-control" placeholder="Enter your phone" required>
         </div>
         <div class="form-group">
           <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to pay">
         </div>
      </form>
    </div>
  </div>
</div>

<body>
  
</body>
</html>