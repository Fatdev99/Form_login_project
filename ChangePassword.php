<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Reset Password</h2>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="text" name="txtuser" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="email" name="txtemail" placeholder="Enter your email" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="btnsub" value="Submit">
      </div>
      <div class="text">
        <h3>
            <?php 
                include ('Control.php');

                $getdata = new Data();
              
                if (isset($_POST['btnsub'])){
                  $change = $getdata->ChangePass($_POST['txtuser'], $_POST['txtemail']);
              
                  if ($change){
                    foreach ($change as $cg){
                      echo "Your Password is: " . $cg['Password'];
                    }
                  }
                  else 
                    echo "<script>alert('User does not exist. Please enter the correct Username or Email')</script>";
                }
            ?>
        </h3>
        <div class="text">
        <h3><a href="Login.php">Login Now?</a></h3>
      </div>
      </div>
    </form>
  </div>

</body>
</html>