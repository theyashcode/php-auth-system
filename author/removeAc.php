<?php
    $title = "Delete Account" ;
    require_once"header.php";
    ?>
   
   <?php
        session_start() ;
        $flag = 0 ;
        if(isset($_SESSION['un']) && isset($_POST['dltSubmit'])){

          $pass = $_POST['pass'] ;
          $pass = htmlspecialchars($pass);
          $pass = sha1($pass) ;

         
         $user =   $_SESSION["username"] ;
 

    require_once 'dbconfig.php' ;
    $db = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
    $db->query(" DELETE FROM users WHERE username='$user' AND password='$pass' ");
    
    if($db->affected_rows>0){
        $flag = 1 ;

            session_unset();
            session_destroy();

           header("Location: login.php");
           exit();
 

    }
    $db->close();

         

         }

   ?>
   <form action="removeAc.php" method="POST"  >

   Enter password    :  <input type="password" name="pass">
   <hr>
   <input type="submit" value="Delete"  name="dltSubmit">
   </form>
  
<p>
    <?php

    if(isset($_POST['dltSubmit'])){
     
        if($flag == 1){
     echo "Account is Deleted" ;
    }
    else{
        echo "Old Password is Wrong" ;
    }
    
    }
    ?>
</p>

    <?php
    require_once"footer.php" ;
    ?>