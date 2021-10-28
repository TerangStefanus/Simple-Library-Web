<?php
    session_start();
    include '../template/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>About Us</title>
</head>
<body>
    <h1>About Us</h1>
    <div class="wrap">
        <div class="row">
            <div class="col-md-3">
                <a href="landing_page.php"><img src="../images/logo1.png" style="width:30vh; height:30vh;"></a>
            </div>
            <div class="col-md-4">
                <p>
                    Luminos Library was founded in 1984. Our founders were a group of bookworms who wanted to share their collection
                    with people, and by doing so we will be able to spread our knowledge and wisdom to the people. 
                    Books are very versatile, they provide knowledge, entertainment, and much more. We wanted to show people
                    the experience and enjoyment that we have got from reading books. Currently we have more than 150.000 books 
                    for you to read and borrow. We are continuously growing bigger with the help of all of our readers.
                </p>
            </div>
        </div>
    </div>
<?php
    include '../template/footer.php';
    include './modal_auth.php';
?>
</body>
<style>
.wrap{
    margin: 32px;
}


.wrap .row .col-md-3{
    background-color: #E3D2C1;
}

.wrap .row .col-md-4{
    background-color:#F0942E;
    padding: 16px;
}

p{
    text-align: justify;
    color: #FFFFFF;
    font-weight: lighter;
}
</style>
</html>