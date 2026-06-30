<?php
session_start();

require_once 'dbconfig.php' ;

$flag = 0 ;

if(isset($_SESSION['un']) && isset($_POST['change'])){

$db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

$user = $_SESSION['un'] ;

$currentPass = $_POST['chngpass'] ;
$currentPass = htmlspecialchars($currentPass);
$currentPass = sha1($currentPass);

$newpass = $_POST['newpass'] ;
$newpass = sha1($newpass);

$query = "SELECT password FROM users WHERE username='$user'" ;
$res = $db->query($query);

if($res->num_rows>0){

$row = $res->fetch_assoc();

if($row['password']==$currentPass){

$query = "UPDATE users SET password='$newpass' WHERE username='$user'";
$db->query($query);

if($db->affected_rows>0){

session_unset();
session_destroy();

header("Location: login.php");
exit();

}

}

}

$db->close();

}

$title = "Password Change" ;
require_once "header.php" ;
?>

<form action="chngpass.php" method="POST">

Current Password :
<input type="password" name="chngpass">

<hr>

New Password :
<input type="password" name="newpass">

<hr>

<input type="submit" value="Change" name="change">

</form>

<p>

<?php

if(isset($_POST['change'])){

if($flag==1){
echo "Password Changed Successfully";
}
else{
echo "Current Password is Wrong";
}

}

?>

</p>

<?php
require_once "footer.php";
?>