<?php
    session_start();
    if (empty($_SESSION['user'])){
        echo "<script>alert('Please login')
            window.location = 'Login.php'
            </script>";
    }
?>

<?php
    include ('Control.php');

    $getdata = new Data();

    $select = $getdata->Select_FormbyUser($_SESSION['user']);

    foreach($select as $sl){
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Welcome <?php echo $_SESSION['user']?></h2>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="text" name="txtuser" value="<?php echo $sl['Username']?>" disabled>
      </div>
      <div class="input-box">
        <input type="email" name="txtemail" value="<?php echo $sl['Email']?>" required>
      </div>
      <div class="input-box">
        <input type="password" name="txtpass" value="<?php echo $sl['Password']?>" required>
      </div>
      <div class="input-box">
      <div class="input-box button">
        <input type="Submit" name="btnsub" value="Update">
      </div>
      <div class="text">
        <h3><a href="Logout.php">Logout</a></h3>
      </div>
    </form>
  </div>

</body>
</html>

<?php
    }

    if (isset($_POST['btnsub'])){
      if (!$getdata->check_length($_POST['txtpass'])){
        echo "<script>alert('Password is less than 8 characters')</script>";
      }
      else{
        $update = $getdata->Update_FormbyUser($_SESSION['user'], $_POST['txtpass'], $_POST['txtemail']);

        if ($update){
            echo "<script>alert('Update Complete')</script>";
        }
        else 
            echo "<script>alert('Update not Complete')</script>";
      } 
    }
?>