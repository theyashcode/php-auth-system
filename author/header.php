<!DOCTYPE html>
<html lang="en">
<head>
<title><?php
 echo $title ;
?>
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  
<div class="logo">
  <h2>codewithyash</h2>
</div>
  
  
<div class="headRight">
<?php
if(isset($_SESSION['un'])){
  ?>
<a href="userDetail.php">my account</a>
<a href="settingg.php">Setting</a>
<?php
}
?>
</div>
</header>
<section>
  <nav>
    <ul>
      <li><a href="index.php">home</a></li>
      <li><a href="member.php">member</a></li>

      <?php 
      if(isset($_SESSION["un"])){
        ?>

        <li><a href="logout.php">logout</a></li>
        <?php
      }
      else{
        ?>
        <li><a href="login.php">login</a></li>
       
        <?php
      }
      ?>
    </ul>
    <br>
<?php
    if(isset($_SESSION["un"])){
      $un = $_SESSION["un"];
      $pic =$_SESSION["pic"] ;
      echo "<span class='premium-badge'>★ Premium Student</span><br>" ;
      echo "hello :  $un<br>" ;
      echo "<img alt='$un' src='$pic' width='110'>" ;
    }
    
?>
  </nav>
  
  <article>