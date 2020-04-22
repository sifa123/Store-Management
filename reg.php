
<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $databasename ="store";
    $con = new mysqli($servername, $username, $password, $databasename);
    

    $errors=array();
        
        if(isset($_POST['regisetr'])){
            $first_name=$_POST['rfname'];
            $last_name=$_POST['rlname'];
            $email=$_POST['rmail'];
            $dob=$_POST['rdob'];
            $blood_group=$_POST['rbg'];
            $gender=$_POST['rgender'];
            $city=$_POST['rcity'];
            $mobile=$_POST['rmobile'];
            $password=$_POST['rpass'];
            $repassword=$_POST['rrpass'];
            if($password==$repassword){
            $sql = mysqli_query($con, "INSERT INTO `register`(`First_name`, `Last_name`, `Email`, `DOB`, `Blood_group`, `Gender`, `City`, `Mobile`, `Password`, `Re_password`) VALUES ('$first_name', '$last_name','$email','$dob','$blood_group', '$gender','$city','$mobile','$password','$repassword')");
            echo 'successfull';
            header('Location: us_login.php');

            }

            else if($password!="" || $repassword!="") {
                array_push($errors,"The two Passwords not matched");
            }
            else{
                array_push($errors,"Registration Failed");
            }
    }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="reg.css" />
    <script src="main.js"></script>
</head><style>
body{
    background-image: url("store2.jpg");
    background-size: cover;
}
label{
    font-family: 'Trebuchet MS';
    font-size: 20px;
}

.form_reg{
    margin: auto;
    background-color: olive;
    width:450px;
    margin-top: 50px;
    
    border-radius: 20px;
    opacity: .6;
}</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php" style="text-decoration: none;"><i style="font-size:25px;">Store Management</i></a>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      
      
       

      
     
    </ul>
   
  </div>
</nav>

   
    <?php include('reg_error.php');?>
    </div>
    <div class="form_reg" style="height:605px;">
    <div class="labels">
    <form action="reg.php" method="post" class="formreg">

<label style="font-size:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register</label>
    <hr><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>First Name</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rfname" class="rfname" required>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Last Name</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rlname" class="rlname" >
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Email</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rmail" class="rmail" required>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Date of Birth</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="date" name="rdob" class="rdob" required>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Blood Group</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rbg" class="rbg"list= "bg" required>
    <datalist id="bg">
                                <option >A+</option>
                                <option >A-</option>
                                <option >B+</option>
                                <option >B-</option>
                                <option >O+</option>
                                <option >O-</option>
                                <option >AB+</option>
                                <option >AB-</option>
                            </datalist>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Gender</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" list="gender" name="rgender"required>
                            <datalist id="gender">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </datalist>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>City</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rcity" class="rcity" required>

    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Mobile</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="rmobile" class="rmobile" required>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Password</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="rpass" class="rpass" required>
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Re-Password</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" name="rrpass" class="rpass" required>
    <br><br><br>
    <input type="submit" name="regisetr" value="REGISTER" style="margin-left:178px;height:30px;width:100px; border-radius:20px;background-color:green;font-size:15px;color:red;opacity:1;">
    <h3 style="margin:10px;color: red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already Registered? <a href="us_login.php">Login</a> Here</h3>
   
    <br><br>
    </form>
    <div>
    </div>
</body>
</html>