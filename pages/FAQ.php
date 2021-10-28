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
    <title>FAQ</title>
</head>
<body>
    <h1>FAQ</h1>
    <p>These are the most frequently asked questions.<br>
    If you have any question, please <a href="contactUs.php"><u>contact us</u></a></p>
    <div class="accordion" id="questionList">
        <div class="card">
            <div class="card-header" id="questionOne">
            <h6 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#answerOne" aria-expanded="true" aria-controls="answerOne">
                    Q: Is Luminos Library free?
                </a>
            </h6>
            </div>
            <div id="answerOne" class="collapse" aria-labelledby="questionOne" data-parent="#questionList">
                <div class="card-body">
                    Yes.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="questionTwo">
            <h6 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#answerThree" aria-expanded="true" aria-controls="answerThree">
                    Q: How to borrow books online?
                </a>
            </h6>
            </div>
            <div id="answerThree" class="collapse" aria-labelledby="questionThree" data-parent="#questionList">
                <div class="card-body">
                    Sorry, as of now you are not able to borrow any books as the feature is currently not done yet.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="questionThree">
            <h6 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#answerFour" aria-expanded="true" aria-controls="answerFour">
                    Q: When will we be able to borrow books online?
                </a>
            </h6>
            </div>
            <div id="answerFour" class="collapse" aria-labelledby="questionFour" data-parent="#questionList">
                <div class="card-body">
                    Soon, really soon, our devs are working on it.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="questionFour">
            <h6 class="mb-0">
                <a href="#" data-toggle="collapse" data-target="#answerTwo" aria-expanded="true" aria-controls="answerTwo">
                    Q: Why am I still here?
                </a>
            </h6>
            </div>
            <div id="answerTwo" class="collapse" aria-labelledby="questionTwo" data-parent="#questionList">
                <div class="card-body">
                just to suffer.
                </div>
            </div>
        </div>
    </div>
<?php
    include '../template/footer.php';
    include './modal_auth.php';
?>  
</body>
<style>
    p, a, u{
        color: white;
    }

    p{
        margin-left: 10vh;
    }
    
    h6 a{
        color: #F1CB9C;
    }

    h6 a:hover{
        color: wheat;
        text-decoration: none;
    }

    
</style>
</html>