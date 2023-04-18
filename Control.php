<?php 
    include('Connect.php');

    class Data{
        function Registration($user, $pass, $email){
            global $conn;

            $sql = "insert into btlogin(Username, Password, Email) values ('$user', '$pass', '$email')";
            $run = mysqli_query($conn, $sql);

            return $run;
        }

        function Login($user, $pass){
            global $conn;

            $sql = "select * from btlogin where Username = '$user' and Password = '$pass'";
            $run = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($run);

            return $num;
        }

        function ChangePass($user, $email){
            global $conn;

            $sql = "select Password from btlogin where Username = '$user' and Email = '$email'";
            $run  = mysqli_query($conn, $sql);
            return $run;
        }

        function Select_FormbyUser($user){
            global $conn;

            $sql = "select * from btlogin where Username = '$user'";
            $run = mysqli_query($conn, $sql);

            return $run;
        }

        function Update_FormbyUser($user, $pass, $email){
            global $conn;

            $sql = "update btlogin set Password = '$pass', Email = '$email' where Username = '$user'";
            $run = mysqli_query($conn, $sql);

            return $run;
        }

        function check_username($username) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                return true;
            }
            return false;
        }

        function check_length($check) {
            if (strlen($check) < 8)
                return false;
            else return true;
        }
    }
?>