
<?php
include '../dbconnect.php';
use PHPMailer\PHPMailer\PHPMailer;

$token = $_GET['token'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE token='$token'")or die(mysqli_error($conn));

if($data = mysqli_fetch_array($query)){
    $token = $data['token'];
    $email = $data['email'];

    require_once "../vendor/phpmailer/src/PHPMailer.php";
    require_once "../vendor/phpmailer/src/SMTP.php";
    require_once "../vendor/phpmailer/src/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "jettpakejudge@gmail.com";
    $mail->Password = 'jett123456789';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, "Luminos Library");
    $mail->addAddress($email);
    $mail->Subject = ("Library Member Verification Code");

    $message_body = '<p>To verify your email address, please enter this verification code when prompted: <b>'.$token.'</b>.</p>
    <p>Sincerely,</p>
    <p>Luminos Library</p>';

    $mail->Body = $message_body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    //exit(json_encode(array("status" => $status, "response" => $response)));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head/head_user.php';
    ?>
    <title>Email Verification</title>
</head>

<body>
    <div class="verification">
        <h3>Enter Verification Code</h3>
        <form action="../proses/verification_proses.php" method="post">
            <div class="form-group">
                <input name="token" type="text" class="form-control"></input>
            </div>
            <input name="verif" type="submit" class="btn btn-primary" value="Enter">
        </form>
    </div>
</body>

<style>
    .verification{
        margin-top: 100px;
        margin-left: 5in;
        margin-right: 5in;
    }
</style>
</html>