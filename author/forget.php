<?php

$user =  $_POST["Uname"] ?? ''; 
$user = htmlspecialchars($user);

    require_once 'dbconfig.php';
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    
    $user = $db->real_escape_string($user);
    $query = "SELECT email FROM users WHERE username='$user' ";

    $res = $db->query($query);


    if ($res && $res->num_rows > 0) {

        $row = $res->fetch_assoc();
        $email = $row['email'];

        if(isset($email)){
            $otp = rand(1000,9999);
            date_default_timezone_set('Asia/Kolkata');
            $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));
            session_start();
            $_SESSION['forget_user'] = $user;

            $query = $query = "UPDATE users SET otp='$otp', otp_expiry='$expiry' WHERE username='$user'";

            $db->query($query);


        

            
        date_default_timezone_set('asia/calcutta');

        require_once "PHPMailer.php";
        require_once "SMTP.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail-> SMTPSecure = 'ssl' ;

        $mail->Host = 'smtp.zoho.in';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'codewithyash@zohomail.in';
        $mail->Password = 'oriri@875029';
        $mail->setFrom('codewithyash@zohomail.in', 'Boomzoom');
        $mail->addAddress($email);
        $mail->Subject = 'This message for your happiness';
        $mail->msgHTML("<h1>$otp</h1>");


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
           header("Location: verifyOtp.php");
           exit();
}

        }
        

        echo "<div style='color: green; padding: 10px;'>Found Email: " . htmlspecialchars($email) . "</div>";
    } 

    
    $db->close();

$title = "Forget Page" ;
require_once "header.php" ;
?>
<form action="" method="post">
    <input type="text" name="Uname" placeholder="enter username"> <br><br>
    <input type="submit" name="forget" value="Forget Password">
</form>
<?php
require_once "footer.php" ;
?>