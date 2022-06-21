<?php 
  require_once("../config/config.php");
  $id = $_GET['id'];

  $remove = $db->exec("DELETE FROM products WHERE id_product=$id");
  if($remove>0){
    echo "<script>alert('Berhasil dihapus'); javascript:history.go(-1)</script>";
  }
?>