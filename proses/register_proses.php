<?php
include '../dbconnect.php';
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = md5($_POST['password']);
//$role = $_POST['role'];
$phonenumber = $_POST['phonenumber'];
$address = $_POST['address'];

//generate token
$token = rand(10000, 99999);
$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($conn));
if(mysqli_num_rows($query) == 0){
    $input = mysqli_query($conn, "INSERT INTO users(fullname, email, password, phonenumber, address, token)
    VALUE('$fullname', '$email', '$password', '$phonenumber', '$address', '$token')") or die(mysqli_error($conn));
    if($input){
        echo '<script>alert("success"); window.location="../pages/verification_email.php?token='.$token.'"</script>';
    }else{
        echo '<script>alert("failed"); window.location="../pages/landing_page.php"</script>';
    }
}else{
    echo '<script>alert("Email already used"); window.history.back()</script>';
}
?>