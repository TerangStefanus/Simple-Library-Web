<?php
    session_start();
    include '../dbconnect.php';
    include '../template/navbar.php';
    $user = $_SESSION['user'];

    
    //info order
    $uid = $user['id'];
    // var_dump($uid);
    // die();
  	// $caricart = mysqli_query($conn,"SELECT * FROM cart WHERE iduser='$uid'");
    // $fetc = mysqli_fetch_array($caricart);
    // // var_dump($fetc);
    // // die();
    // if(!empty($fetc)){
    //      $orderidd = $fetc['orderid'];   
    // }
    // $itungtrans = mysqli_query($conn,"SELECT count(orderid) as jumlahtrans from cart where id='$uid' and status!='Cart'");
    // $itungtrans = mysqli_query($conn,"SELECT count(detailid) as jumlahtrans FROM detailorder WHERE orderid='$orderidd'");
	// $itungtrans2 = mysqli_fetch_assoc($itungtrans);
	// $itungtrans3 = $itungtrans2['jumlahtrans'];
	
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>User Profile</title>
</head>

<body>
    <h1>My Account</h1>
    <div class="account">
        <div class="row">
            <div class="col" id="profile">
                <h3><?php echo $user['fullname'] ?></h3>
                <h5><?php echo $user['email'] ?></h5>
                <h5><?php echo $user['phonenumber'] ?></h5>
                <h5><?php echo $user['address'] ?></h5>
                <a href="managePersonalDetails.php" type="submit" class="btn btn-primary btn-block">Manage Account</a>
            </div>
        </div>
    </div>
</body>

<style>
    h3,
    h5 {
        text-align: center;
    }

    h5 {
        color: #E57600;
    }

    .btn {
        margin-top: 21em;
    }

    p {
        font-weight: lighter;
        margin-left: 12px;
        margin-top: 30px;
        color: #F1CB9C;
    }

    .account{
        margin: 0px 700px;
        border: 1px solid #5FA2BE;
        border-radius: 10px;
        color: white;
        padding-top:30px;
        padding-left:0px;
        padding-right:70px;
    }

</style>

<?php
    include '../template/footer.php';
?>

</html>