<?php
    if(isset($_POST['verif'])){
        include '../dbconnect.php';

        //$email = $_POST['email'];
        $token = $_POST['token'];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE token='$token' AND isVerified=0") or die(mysqli_error($conn));

        if($query){
            $input = mysqli_query($conn, "UPDATE users SET isVerified=1 WHERE token='$token'") or die(mysqli_error($conn));
            if($input){
                $user = mysqli_fetch_assoc($query);
                session_start();
                $_SESSION['isLogin'] = true;
                $_SESSION['user'] = $user;
                echo '<script>alert("Your account has been actived"); window.location="../pages/landing_page.php"
                      </script>';
            }
        }else{
            echo '<script>alert("Something went wrong..."); window.history.back()"
                  </script>';
        }
    }
?>