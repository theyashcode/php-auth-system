<?php
session_start();

$message = "";

if(isset($_SESSION['forget_user']) && isset($_POST['verify']))
{

    require_once 'dbconfig.php';
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    $user = $_SESSION['forget_user'];

    $otp = $_POST['otp'];
    $otp = htmlspecialchars($otp);

    $query = "SELECT otp, otp_expiry FROM users WHERE username='$user'";

    $res = $db->query($query);

    if($res && $res->num_rows > 0)
    {

        $row = $res->fetch_assoc();

        date_default_timezone_set('Asia/Kolkata');
        $current = date("Y-m-d H:i:s");

        if($otp != $row['otp'])
        {

            $message = "Invalid OTP";

        }
        else if($current > $row['otp_expiry'])
        {

            $message = "OTP Expired";

        }
        else
        {

            header("Location:newpassword.php");
            exit();

        }

    }

    $db->close();

}
$title = "verify Otp";
require_once "header.php";
?>

<h2>Verify OTP</h2>

<?php
echo $message;
?>

<form action="" method="post">

    <input type="text" name="otp" placeholder="Enter OTP">

    <br><br>

    <input type="submit" name="verify" value="Verify OTP">

</form>

<?php
require_once "footer.php";
?>