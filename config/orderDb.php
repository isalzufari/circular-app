<?php
  require_once('./config.php');

  $nameTicket = $_GET['nameTicket'];
  $mobileNumberTicket = $_GET['mobileNumber'];
  $emailTicket = $_GET['emailTicket'];
  $priceTotal = $_GET['priceTotal'];
  $id_bus = $_GET['idBus'];

  $query = $db->exec("INSERT INTO customer(nama, email, no_telp) VALUES('$nameTicket','$emailTicket','$mobileNumberTicket')");
  $id_customer = $db->lastInsertId();
  if ($id_customer > 0) {
    $db->exec("INSERT INTO tiket(id_customer, id_bus, tgl_psn, status_pembayaran, price_total) VALUES('$id_customer','$id_bus',now(),'0','$priceTotal')");
    $id_ticket = $db->lastInsertId();
    echo "<script>location.href = '../pay.php?id=$id_ticket';</script>";
  }
?>