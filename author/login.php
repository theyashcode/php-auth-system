<?php
session_start();

$message = "";

if(isset($_POST["sublogin"])){

    $user = $_POST["Uname"];
    $user = htmlspecialchars($user);

    $pass = $_POST["pass"];
    $pass = htmlspecialchars($pass);
    $pass = sha1($pass);

    require_once 'dbconfig.php';
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    $user = $db->real_escape_string($user);
    $pass = $db->real_escape_string($pass);

    $query = "SELECT username, profile_pic, age, fname, mobilenumber, country, gender
              FROM users
              WHERE username='$user' AND password='$pass'";

    $res = $db->query($query);

    if($res->num_rows == 1){

        $row = $res->fetch_assoc();

        $_SESSION["username"] = $user;
        $_SESSION["pass"] = $pass;

        $_SESSION["un"] = $row["username"];
        $_SESSION["pic"] = $row["profile_pic"];
        $_SESSION["age"] = $row["age"];
        $_SESSION["fullname"] = $row["fname"];
        $_SESSION["number"] = $row["mobilenumber"];
        $_SESSION["country"] = $row["country"];
        $_SESSION["gender"] = $row["gender"];

    }else{
        $message = "Some details are wrong";
    }

    $db->close();
}

$title = "login";
require_once "header.php";


?>
<?php
if(isset($_SESSION['un'])){
    ?>
    <h1>Login to Your Codewithyash Account</h1>
    <br><br>
    <?php
}
?>


<?php
if(isset($_SESSION["un"])){
    echo "You have logged in as : " . $_SESSION["un"];
}
else{
?>

<p style="color:red;">
    <?php echo $message; ?>
</p>

<form action="login.php" method="POST">

    Username :
    <input type="text" name="Uname">
    <hr>

    Password :
    <input type="password" name="pass">
    <hr>

    <input type="submit" value="Login" name="sublogin">

</form>

<br><br>

<div class="withoutLogin">
    <a href="newuser_form.php">New User</a><br><br>
<a href="forget.php">Forget Password</a>
</div>

<?php
}
?>

<?php
require_once "footer.php";
?>