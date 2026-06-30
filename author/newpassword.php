<?php
session_start();

$message = "";

if(isset($_SESSION['forget_user']) && isset($_POST['change']))
{

    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $pass = htmlspecialchars($pass);
    $cpass = htmlspecialchars($cpass);

    if($pass == $cpass)
    {

        require_once 'dbconfig.php';

        $db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        $user = $_SESSION['forget_user'];

        $pass = sha1($pass);

        $query = "UPDATE users SET password='$pass', otp=NULL, otp_expiry=NULL WHERE username='$user'";

        if($db->query($query))
        {

            unset($_SESSION['forget_user']);

            header("Location: login.php");
            exit();

        }
        else
        {

            $message = "Password Not Changed";

        }

        $db->close();

    }
    else
    {

        $message = "Password and Confirm Password do not match";

    }

}

$title = "Member Page" ;
require_once "header.php";
?>

<h2>New Password</h2>

<?php
echo $message;
?>

<form action="newpassword.php" method="post">

    <input type="password" name="pass" placeholder="New Password">

    <br><br>

    <input type="password" name="cpass" placeholder="Confirm Password">

    <br><br>

    <input type="submit" name="change" value="Change Password">

</form>

<?php
require_once "footer.php";
?>