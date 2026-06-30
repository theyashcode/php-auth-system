<?php

session_start() ;
if(isset($_SESSION["un"])){
    unset($_SESSION["un"]) ;
    session_destroy();
    $_SESSION = array() ;
}
$title = "logout" ;
require_once"header.php";
?>

<h1>You've Been Logged Out</h1>
<p>Thanks for learning with Codewithyash today!</p>
<P>Come back soon to continue your journey 🎓</P>

<?php
require_once"footer.php";
?>