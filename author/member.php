<?php
session_start();
$title = "member" ;
require_once"header.php";
?>
<?php

if(isset($_SESSION["un"])){
?>

<h1>Student Dashboard</h1>
<p>Welcome back, Champion! 🎓</p>
<p>Your premium subscription is active.</p>
<p>You now have full access to recorded lectures, live doubt sessions, downloadable notes, and our private student community. Keep learning, keep growing!</p>

 <?php

}
else{
    ?>

      <h1>Student Dashboard</h1>
      <p>This is a members-only area.</p>
      <p>Please log in to access your premium classes, notes, and recorded lectures.</p>
 <?php
}
?>




<?php
require_once"footer.php";
?>