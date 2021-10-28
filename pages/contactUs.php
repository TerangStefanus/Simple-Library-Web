<?php
    session_start();
    include '../template/navbar.php';
    include '../dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Contact Us</title>
</head>

<body>
    <h1>Contact Us</h1>
    <div class="container">
        <div id="socmed" style="margin-left:300px">
            <a href="https://www.facebook.com/"><img src="../images/Facebook Icon.png" height="180px" class="fab fa-facebook-square pr-4" 
            style="text-decoration: none; color: white;"></a>
            <a href="https://www.instagram.com/"><img src="../images/Instagram Icon.png" height="180px" class="fab fa-instagram align-middle pr-4" 
            style="text-decoration: none; color: white;"></a>
            <a href="https://www.twitter.com/" ><img src="../images/Twitter Icon.png" height="180px" class="fab fa-twitter pr-4" 
            style="text-decoration: none; color: white;"></a>
        </div>
    </div>

    <?php
        include '../template/footer.php';
        include './modal_auth.php';
    ?>
</body>

</html>