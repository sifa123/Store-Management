 
<?php
session_start();
$host="localhost";
$user="root";
$password="";
$database="store";


$errors=array();
$con = new mysqli($host, $user, $password, $database);

if(isset($_POST['lmail'])){
$email=$_POST['lmail'];
$pass=$_POST['lpass'];

$sql="select * from register where Email='".$email."' AND Password='".$pass."' limit 1";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)==1){
    $_SESSION['Email']=$email;
    $_SESSION['Pass']=$pass;
    $_SESSION['loggedin'] = true;
    header('Location: product.php');
    exit;
}
else{
    array_push($errors,"Incorrect Username or Password");
    
}
}

?>
 <!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="us.css" />
        <title>User Login Page</title>
    </head><style>
    body{
     background-image: url("store1.jpg");
    
    background-size: cover;}

    .login{
    margin-left: 500px;
    background-color: olive;
    height: 250px;
    width:450px;
    margin-top: 200px;
   
    border-radius: 20px;
    opacity: .6;
    font-size: 20px;
}
</style>
    <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php" style="text-decoration: none,background-color:#2F4F4F,margin:30px;"><i style="font-size:25px;">Store Management</i></a>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      
      
       

      
     
    </ul>
   
  </div>
</nav>

                    <?php include('reg_error.php');?>
        <div class="login">
                <form action="us_login.php" method="post" class="login_form">
                        <label style="font-size:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USER LOGIN</label>
                        <hr><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>E-mail</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="lmail" class="lmail" placeholder="Enter your email here" required>
                        <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>Password</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="password" name="lpass" class="lpass" placeholder="Password" required>
                            <br><br>
                            
                            <input type="submit" name="llogin" value="Login" style="margin-left:178px;height:30px;width:100px; border-radius:20px;background-color: burlywood;font-size:15px;color:red;opacity:1;">
                            <h3 style="margin:10px;color: red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not Yet Registered? <a href="reg.php">Register</a> Here</h3>
   
                            </form>
        </div>
    </body>
</html>