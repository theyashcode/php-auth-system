  </article>
</section>

<footer>
  <p>wellcome to codewithyash</p>
  <?php
 
 if(isset($_SESSION["un"])){

  echo "hello : " .$_SESSION["un"] ;
 }
 else{
  echo "hello guest !!" ;
 }
  ?>
</footer>

</body>
</html>

