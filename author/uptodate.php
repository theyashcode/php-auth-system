<?php
    session_start();
    require_once 'dbconfig.php' ;
    $db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

    $pass = $_SESSION['pass'] ;


    $query = "SELECT * FROM users WHERE password='$pass' ";
    $res = $db->query($query);
    $row = $res->fetch_assoc(); //btw ye db se data layega!!

    if(isset($_POST['update'])){

        $username= $_POST['username'] ;
        $age= $_POST['age'] ;
        $mobilenumber= $_POST['mobilenumber'] ;
        $country = $_POST['country'] ;
        $gender = $_POST['gender'] ;

        $query = "UPDATE users SET username='$username', age='$age' , mobilenumber='$mobilenumber' , country='$country' , gender='$gender' WHERE password='$pass' " ;
        $db-> query($query) ;

        $_SESSION['un'] = $username ;
        $_SESSION['age'] = $age ;
        $_SESSION['number'] = $mobilenumber ;
        $_SESSION['country'] = $country ;
        $_SESSION['gender'] = $gender ;

        echo "Profile Updated Successfully" ;
    }
    

    $title = "change detail" ;
    require_once"header.php";
    ?>

    <form method="POST" action="uptodate.php">

    Username :
    <br> <input type="text" name="username" value="<?php echo $row['username']; ?>">
    
    <br><br>
    
    
    Age :
    <br>
    
    <input
    type="number"
    name="age"
    value="<?php echo $row['age']; ?>">

    <br><br>


    Mobile :
    <br>

    <input
    type="text"
    name="mobilenumber"
    value="<?php echo $row['mobilenumber']; ?>">

    <br><br>


    Country :
    <br>

    <input
    type="text"
    name="country"
    value="<?php echo $row['country']; ?>">

    <br><br>

    Gender  : <input type="radio" name="gender" value="male" <?php
     if($row['gender'] == "male"){ echo "checked" ; }     ?> > Male 
              <input type="radio" name="gender" value="female" <?php
     if($row['gender'] == "female") { echo "checked" ; }     ?> >  female

    <br><br>


    <input
    type="submit"
    name="update"
    value="Update Profile">

 

    </form>
    <?php
    require_once"footer.php"
    ?>
