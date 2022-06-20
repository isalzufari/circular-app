<?php
  require_once('./config.php');
  session_start();
  $id = $_SESSION['id_user'];
  $sql_check = $db->query("SELECT status_pembayaran FROM `order` WHERE id_user = '$id'"); 
  $showDom = 0;

  foreach($sql_check as $check) {
    if("$check[status_pembayaran]" == 0) {
      $showDom += 1;
    } else {
      echo "<script>location.href = '../statusOrder.php';</script>";
    }
  }

  if($showDom >= 1) {
    showDom($id);
  } else {
    // echo "<script>location.href = '../statusOrder.php';</script>";
  }

  print($showDom);

  function showDom($id){
    ?> 
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <?php require('../components/head.php') ?>
        <title>Verify Check</title>
      </head>
      <body>
        <?php require('../components/header.php'); ?>
        <section>
          <div class="container p-5 d-flex justify-content-center">
            
            <div class="card mb-4 shadow-sm">
              <div class="card-body">
                <div class="alert alert-warning" role="alert">
                  Anda belum membayar pesanan anda!
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <a class="btn btn-secondary" href="../pay.php?id=<?php echo $id ?>">Kembali</a>      
                  <button class="btn btn-primary" onClick="window.location.reload();">Perbarui</button>    
                </div>
              </div>
            </div>

          </div>
        </section>
        <?php require('../components/footer.php') ?>
      </body>
      </html>
    <?php
  }

  // $check_ticket = $sql_check-> fetch();
  // if ("$check_ticket[status_pembayaran]" == 0) {
  //   echo "<script>location.href = '../pay.php?id=$id'; alert('Anda belum bayar!');</script>;";
  // } else {
  //   echo "<script>location.href = '../statusOrder.php?id=$id';</script>";
  // }
?>