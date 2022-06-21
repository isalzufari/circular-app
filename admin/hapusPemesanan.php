<?php 
  require_once("../config/config.php");
  $id = $_GET['id'];

  $remove = $db->exec("DELETE FROM `order` WHERE id_user=$id");
  if($remove>0){
    echo "<script>alert('Berhasil dihapus'); javascript:history.go(-1)</script>";
  }
?>