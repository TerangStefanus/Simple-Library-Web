<?php
    session_start();
    include '../template/navbar.php';
    include '../dbconnect.php';
    $user = $_SESSION['user'];

    //var_dump((count($_POST) > 0 ? "lebih dari 0" : "kurang dari atau 0"));
    //die();
    if (count($_POST)>0) {
        // echo
        // '<script>
        //             alert("masuk if asdasdasdad");
        // </script>';
        $password = $_POST['currentPassword'];
        $password1 = $_POST['newPassword'];
        $password2 = $_POST['confirmPassword'];

        $id_user = $user['id'];

        $password1 = md5($password1);
        $result = mysqli_query($conn, "SELECT *from users WHERE id='" . $id_user . "'");
        $row = mysqli_fetch_array($result);
        if (md5($password) == $row["password"]) {
            if($password1==md5($password2)){
                $update = mysqli_query($conn, "UPDATE users set password='" . $password1 . "' WHERE id='" . $id_user . "'");
                if($update){
                    $result = mysqli_query($conn, "SELECT *from users WHERE id='" . $id_user . "'");
                    $row = mysqli_fetch_array($result);
                    $_SESSION['user'] = $row;
                    echo
                    '<script>
                            alert("Changed");
                    </script>';
                }else{
                    echo
                    '<script>
                         alert("failed 1");
                    </script>';
                }
                
            }else{
                echo
                '<script>
                    alert("failed 2");
                 </script>';
            }
            
        } else{
            echo
            '<script>
                    alert("failed 3");
            </script>';
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Manage Password</title>
</head>
<body>
    <div class="tab">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="managePersonalDetails.php">Personal Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Change Password</a>
            </li>
        </ul>
    </div>
    <hr>
    <div class="manageAccount">
        <fieldset>
        <h3>Personal Details</h3>
        <form action="" method="POST">
            <div class="form-group row">
            <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                <div class="col-sm-9">
                    <input type="password" name="currentPassword" class="form-control" id="current_password">
                </div>
            </div>
            <div class="form-group row">
            <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="password" name="newPassword" class="form-control" id="new_password">
                </div>
            </div>
            <div class="form-group row">
            <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" name="confirmPassword" class="form-control" id="confirm_password">
                </div>
            </div>
        </fieldset>
            <div class="form-group row" id="manage">
                <div><a href="userProfile.php" class="backbtn">🡠 Back</a></div>
                <div><button type="submit" class="btn btn-primary">Save Changes</button></div>
            </div>
        </form>
    </div>
    
</body>
<?php
    include '../template/footer.php';
?>
</html>
