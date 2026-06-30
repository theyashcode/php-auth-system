<?php
session_start();
$flag = 0;

if(isset($_POST["subsave"])){

    $user = $_POST["uname"];

    $pass = $_POST["pass"];
    $pass = sha1($pass);

    $fname = $_POST["fname"];
    $age = $_POST["age"];
    $mobile = $_POST["mobile"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];
    $email = $_POST["email"] ;


    $path = "imges/dummy.jpg";

    if($_FILES["f"]["error"]==0){
        $path = "imges/" . $_FILES["f"]["name"];
        move_uploaded_file($_FILES["f"]["tmp_name"],$path);
    }

    require_once "dbconfig.php";

    $db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

    // username check
    $result = $db->query("select * from users where username='$user'");

    if($result->num_rows>0){
        $flag = 2;
    }
    else{

        $db->query("insert into users(username,password,fname,age,mobilenumber,country,gender,profile_pic,email) values('$user','$pass','$fname',$age,'$mobile','$country','$gender','$path','$email')");

        if($db->affected_rows>0){
            $flag = 1;
        }

    }

    $db->close();

}

$title = "new user";
require_once "header.php";
?>

<h1>New User</h1>

<p>
<?php

if($flag==1){
    echo "Data has been inserted. Please login to explore further.";
}
elseif($flag==2){
    echo "<font color='red'>Username already exists. Please choose another username.</font>";
}
else{
    echo "There was an error. Please check.";
}

?>
</p>

<?php
require_once "footer.php";
?>