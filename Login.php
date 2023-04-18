<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Form </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="text" name="txtuser" placeholder="Enter your name"  required>
      </div>
      <div class="input-box">
        <input type="password" name="txtpass" placeholder="Enter your password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="btnsub" value="Login Now">
      </div>
      <div class="text">
        <h3><a href="ChangePassword.php">Forgot your password?</a><a href="Registration.php">Have not an Account?</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
<?php 
  include ('Control.php');

  $getdata = new Data();

  if (isset($_POST['btnsub'])){
    $login = $getdata->Login($_POST['txtuser'], $_POST['txtpass']);

    if (!$getdata->check_username($_POST['txtuser'])){
      echo "<script>alert('Username only text and number')</script>";
    }
    else if (!$getdata->check_length($_POST['txtuser']) || !$getdata->check_length($_POST['txtpass'])){
      echo "<script>alert('Username or Password is less than 8 characters')</script>";
    }
    else{
      if ($login == 1){
        $_SESSION['user'] = $_POST['txtuser'];
  
        echo "<script>alert('Login Complete')
          window.location = 'Mainpage.php';
          </script>";
      }
      else 
        echo "<script>alert('Login not Complete. Username is not exist or Password incorrect')</script>";
    }
  }
?>
