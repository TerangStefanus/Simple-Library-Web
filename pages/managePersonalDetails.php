<?php
    session_start();
    include '../template/navbar.php';
    $user = $_SESSION['user'];
?>
<?php
    include '../dbconnect.php';
    if(isset($_POST['save']))
    {
        $id = $_POST['id'];
        // var_dump($id);
        // die();
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'] ;
        $address = $_POST['address'];
        // update user data
        $query = mysqli_query($conn, "UPDATE users SET fullname='$fullname',email='$email',phonenumber='$phonenumber', address='$address' WHERE id='$id'") or die(mysqli_error($conn));

        if($query){
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' Limit 11") or die(mysqli_error($conn));
            $user = mysqli_fetch_assoc($query);

            $_SESSION['user'] = $user;
        }
   
        // Redirect to homepage to display updated user in list
        header("Location: ../pages/userProfile.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Manage Account Personal Details</title>
</head>
<body>
    <div class="tab">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Personal Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="managePassword.php">Change Password</a>
            </li>
        </ul>
    </div>
    <hr>
    <div class="manageAccount">
        <fieldset>
            <h3>Personal Details</h3>
            <form action="" method="POST">
                <input name="id" type="hidden" class="form-control" value="<?php echo $user['id']?>"> 
                <div class="form-group row">
                <label for="user_fullname" class="col-sm-3 col-form-label">Fullname</label>
                    <div class="col-sm-9">
                        <input name="fullname" type="text" class="form-control" id="user_fullname" value="<?php echo $user['fullname']?>">
                    </div>
                </div>
                <div class="form-group row">
                <label for="user_email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input name="email" type="email" class="form-control" id="user_email" value="<?php echo $user['email']?>">
                    </div>
                </div>
                <div class="form-group row">
                <label for="user_phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input name="phonenumber" type="text" class="form-control" id="user_phone_number" value="<?php echo $user['phonenumber']?>">
                    </div>
                </div>
                <div class="form-group row">
                <label for="street_address" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" class="form-control" id="street_address" value="<?php echo $user['address']?>">
                    </div>
                </div>
            </fieldset>
                <div class="form-group row" id="manage">
                    <div><a href="userProfile.php" class="backbtn">🡠 Back</a></div>
                    <div><input name="save" type="submit" class="btn btn-primary" value="Save Changes"></input></div>
                </div>
            </form>
    </div>
        
</body>

<?php
    include '../template/footer.php';
?>
</html>
