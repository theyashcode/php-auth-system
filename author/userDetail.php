<?php
    require_once 'dbconfig.php' ;
    $title = "View Account" ;
    require_once"header.php";
    ?>
<h2>Account Detail</h2>
<?php



session_start() ;


if(isset($_SESSION["un"])){
$username =   $_SESSION["un"] ;
$fullname  =   $_SESSION["fullname"] ;
$age =        $_SESSION["age"] ;
$gender =   $_SESSION["gender"] ;
$number =   $_SESSION["number"] ;
$country =   $_SESSION["country"] ;
$pic = $_SESSION["pic"] ;


echo "<div class='profile-pic-wrap'><img alt='userimg' src='$pic'></div>";
echo "username : $username" ."<br><br>";
echo "fullname : $fullname" ."<br><br>";
echo "Age : $age" ."<br><br>";
echo "Gender : $gender" ."<br><br>";
echo "Number : $number" ."<br><br>";
echo "Country : $country" ."<br><br>";
?>
<div class="updatebtn">
    <a href="uptodate.php">change details</a>
</div>
<?php
}
else{
    echo "First you login !!" ;
}









?>

<?php
require_once "footer.php" ;
?>