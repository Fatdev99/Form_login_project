<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Form </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="text" name="txtuser" placeholder="Create your username" required>
      </div>
      <div class="input-box">
        <input type="email" name="txtemail" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="txtpass" placeholder="Create your password" required>
      </div>
      <div class="input-box">
        <input type="password" name="txtre_pass" placeholder="Confirm password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="btnsub" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="Login.php">Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>

<?php 
  if (isset($_POST['btnsub'])){
    include ('Control.php');
    $getdata = new Data();

    if (!$getdata->check_username($_POST['txtuser'])){
      echo "<script>alert('Username only text and number')</script>";
    }
    else if (!$getdata->check_length($_POST['txtuser']) || !$getdata->check_length($_POST['txtpass'])){
      echo "<script>alert('Username or Password is less than 8 characters')</script>";
    }
    else if ($_POST['txtpass'] != $_POST['txtre_pass']){
      echo "<script>alert('Error: Please Re-enter the Correct Password')</script>";
    }
    else{
      $regis = $getdata->Registration($_POST['txtuser'], $_POST['txtpass'], $_POST['txtemail']);

      if ($regis){
        echo "<script>alert('Registration Complete')</script>";
      }
      else
      echo "<script>alert('Error: Registration not Complete')</script>";
    }
  }
?>
