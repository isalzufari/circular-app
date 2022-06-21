<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('../components/head.php'); ?>
  <title>Dashboard</title>
</head>
<body>
  <?php 
    require('./components/header.php');
    require('../config/config.php');
  ?>
  <section class="container p-5">
    <div class="row">
      <div class="col">
        <div class="row">
            <div class="col">
                <h3>Produk</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="addProduct.php" class="btn btn-primary ">Tambah</a>
            </div>
            <div class="row mt-3">
                <?php
                $showProducts=$db->query("SELECT * FROM products");
                $showProduct = $showProducts->fetch();

                if ($showProduct) {
                    foreach($showProducts as $product):
                    ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col-4 d-flex align-items-center">                                         
                                        <img src="<?php echo $product['img_url'] ?>" width="152px" class="rounded-circle ml-3">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                            <p class="card-text"><?php echo substr_replace($product['desc'], "...", 55) ?></p>
                                            <p class="card-text">Rp <?php echo number_format($product['price']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <a href="deleteProduct.php?id=<?php echo $product['id_product']; ?>" class="card-link">Delete</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php
                    endforeach; 
                } else {
                ?> 
                    <div class="alert alert-info" role="alert">
                        Anda belum memasukan produk ke keranjang!
                    </div>
                <?php
                }
            ?>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <h3>Pemesanan</h3>
            </div>
            <div class="row mt-3">
            <?php
                $showOrders = $db->query("SELECT DISTINCT `order`.id_user, `order`.status_pembayaran, `users`.nama, `users`.`email` 
                FROM `users` INNER JOIN `order` ON `order`.id_user = users.id_user ORDER by tgl_order");      
                
                function statusPembayaran($status) {
                    if ($status == 1) {
                        return 'Sudah Bayar';
                    } else {
                        return 'Belum Bayar';
                    }
                }

                foreach($showOrders as $order):
                    if ($order) {
                    ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $order['nama'] ?></h5>
                                            <p class="card-text text-muted"><?php echo $order['email'] ?></p>
                                            <p class="card-text"><?php echo statusPembayaran($order['status_pembayaran']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="detailPemesanan.php?id=<?php echo $order['id_user']; ?>" type="button" class="btn btn-primary card-link">Detail</a>
                                            <a href="hapusPemesanan.php?id=<?php echo $order['id_user']; ?>" type="button" class="btn btn-danger card-link">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php
                    } else {
                    ?> 
                        <div class="alert alert-info" role="alert">
                            Belum ada Transaksi!
                        </div>
                    <?php
                    }
                    
                endforeach; 

                
            ?>
            </div>
        </div>
      </div>
    </div>
  </section>
  <?php require('../components/footer.php'); ?>
</body>
</html>