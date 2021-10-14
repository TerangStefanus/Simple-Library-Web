<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrit
        y="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet">
    <title>SIGN UP</title>
</head>

<body>
    <section id="signup" class="container">
        <div class="card border-0 shadow-lg">
            <div class="row no-gutters ">
                <div id="signup-image" class="col-md-6 d-none d-lg-block d-md-block">
                    <img class="card-img" src="../assets/images/signupIllustration.png" alt="illustration-signup"
                        style="max-width: 100%;">
                </div>
                <div class="col-md-6">
                    <div id="divSignUp">
                        <div id="signup-text" class="row-2 text-center">
                            <h1><b>SIGN UP</b></h1>
                        </div>
                        <div class="pt-3">
                            <div class="card-body">
                                <!---------------------------------------------- FORM BUAT SIGNUP---------------------------------->
                                <form method="POST" name="register" id="formSignUp"
                                    action="../proses/unverifiedProses.php" class="px-5 needs-validation" novalidate>
                                    <div class="form-row" id="inputName">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text ">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input name="name" type="name" class="form-control " id="nameInput"
                                                placeholder="Full Name" required>
                                            <div class="invalid-feedback">
                                                Please fill your full name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row" id="inputEmail">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input name="email" type="email" class="form-control "
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter an valid email.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3 pl-0">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text ">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input name="password" type="password" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid password.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3 pr-0">
                                            <div class="input-group mb-3 ">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text ">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input name="password" type="password" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid password.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mt-2 mb-0">By signin up, you confirm that u accept our<a href="./registerPage.php" class="textprimary">
                                    </a></p>

                                    <div class="d-grid gap-2">
                                        <button   button type="submit" class="btn btn-primary" name="SignUp">Sign Up</button>
                                    </div>

                                    <p class="mt-2 mb-0">Already Have an Account ? <a href="./login.php" class="textprimary">
                                    Login</a></p>
    </section>
</body>

</html>