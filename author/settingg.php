if(isset($_SESSION['un'])){
    <?php
    require_once 'dbconfig.php' ;
    $title = "Setting" ;
    require_once"header.php";
    ?>
 

   <div class="setting">
    
    <a href="chngpass.php">Change Password</a> <br><br>
    <a href="userDetail.php">View Profile</a> <br><br>
    <a href="removeAc.php">Delet Account</a> <br><br>
   </div>

    <?php
    require_once"footer.php" ;
    ?>
}