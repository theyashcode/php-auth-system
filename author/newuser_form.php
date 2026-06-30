<?php
$title = "new user form" ;
require_once"header.php";
?>
<form action="newuser.php" method="post" enctype="multipart/form-data">
username :    <input type="text" name="uname" required><hr>
password :    <input type="password" name="pass" required><hr>
first name :  <input type="text" name="fname" required><hr>
age      :    <input type="number" name="age" required><hr>
email    :    <input type="email"  name="email" required><hr>
mobile   :    <input type="number" name="mobile" required><hr>
country  : <select name="country" required >
           <option >India</option>
           <option >China</option>
           <option >Japan</option>
           <option >USA</option>
</select><hr>
Gender  : <input type="radio" name="gender" value="male" > Male 
          <input type="radio" name="gender" value="female" > female 
<hr>
select profile pic : <input type="file" name="f"><hr>
<input type="submit" name="subsave" value="save data">
</form>

<?php
require_once"footer.php";
?>