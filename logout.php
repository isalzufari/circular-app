<?php session_start();
unset($_SESSION["status"]);
unset($_SESSION["nama_user"]);
unset($_SESSION["id_user"]);

if(!isset($_SESSION['id_masyarakat'])) {
   header('location:login.php');
}
?>
