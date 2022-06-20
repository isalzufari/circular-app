<?php
  setcookie('products','', time()-3600);
  header("Location: ./pay.php");
  die();
?>