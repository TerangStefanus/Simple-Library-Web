<?php
if(isset($_POST['login'])) {
    include('../dbconnect.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' Limit 11") or die(mysqli_error($conn));
        if(mysqli_num_rows($query) == 0){
            echo
            '<script>
                alert("email not found"); window.location = "../pages/landing_page.php"
            </script>';
        }else{
            $user = mysqli_fetch_assoc($query);
            if( md5($password) == $user["password"]){
                    session_start();
                    $_SESSION['isLogin'] = true;
                    $_SESSION['user'] = $user;
                    if($user['role'] == "admin"){
                        echo
                        '<script>
                            alert("Login Success"); window.location = "../admin/index.php"
                        </script>';
                    }else if($user['role'] == "member"){
                        echo
                        '<script>
                            alert("Login Success"); window.location = "../pages/landing_page.php"
                        </script>';
                    }
            } else {
                echo
                    '<script>
                        alert("email or Password Invalid"); window.location = "../pages/landing_page.php"
                    </script>';
            }
        }
}else{
echo
    '<script>
        window.history.back()"
    </script>';
}
?>
<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Sign In</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="user_email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="user_password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"></input>
                    </div>
                    <label>Don't have account? <a href="" data-dismiss="modal" data-toggle="modal" data-target="#signUp"><u>Sign Up</u></a></label>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="login">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sign Up</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../proses/register_proses.php" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user_fullname" class="col-form-label">Fullname</label>
                        <input name="fullname" type="text" class="form-control" id="user_fullname">
                    </div>
                    <div class="form-group">
                        <label for="user_phone" class="col-form-label">Phone Number</label>
                        <input name="phonenumber" type="text" class="form-control" id="user_phone"></input>
                    </div>
                    <div class="form-group">
                        <label for="user_email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="user_email">
                    </div>
                    <div class="form-group">
                        <label for="user_password" class="col-form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="user_password"></input>
                    </div>
                    <div class="form-group">
                        <label for="user_address" class="col-form-label">Address</label>
                        <input name="address" type="text" class="form-control" id="user_address"></input>
                    </div>
                    <label>Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signIn"><u>Sign In</u></a></label>
                </div>
                <div class="modal-footer">
                    <input name="signUp" type="submit" class="btn btn-primary" value="SignUp">
                </div>
                </form>
            </div>
        </div>
    </div>


<style>
    .modal-content{ background-color: #2E3C3F;}

    .close{color: white;}

    .close:hover{color: #E57600;}

    .modal-header{border-bottom: 1px solid #E57600;}

    .modal-footer{border-top: 1px solid #E57600;}

    a u{color: #E57600}
</style>