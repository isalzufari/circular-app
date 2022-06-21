<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../components/head.php') ?>
    <title>Detail Pemesanan</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('../config/config.php');
    $id = $_GET['id'];
    $sql = $db->query("SELECT * FROM `users` 
    INNER JOIN `order` ON `order`.id_user = users.id_user
    WHERE `order`.id_user = '$id'");

    $orderDetail = $sql->fetch();
    $sub_total = 0;
  ?>
  <section>
    <div class="container p-5">
        <h2 class="mb-3">Order <?php echo $orderDetail['nama'] ?></h2>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <h2><?php echo $orderDetail['nama'] ?> <h6><?php echo $orderDetail['email'] ?></h6></h2>
                        <small class="text-muted"><?php echo $orderDetail['alamat'] ?></small>
                    </div>
                    <div class="col">
                        <h2 class="text-center rounded-pill bg-warning text-dark p-2 m-3">PAY<?php echo $orderDetail['no_telp']?>CIRCULAR</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p><b>Product</b></p></div>
                    <div class="col"><p><b>SubTotal</b></p></div>
                </div>
                <div>
                  <?php
                    $products = $db->query("SELECT * FROM `users` 
                    INNER JOIN `order` ON order.id_user = users.id_user
                    INNER JOIN `products` ON products.id_product = order.id_product WHERE order.id_user = '$id'");
                    foreach($products as $product):
                    $sub_total += $product['price']; 
                  ?>
                    <div class="row mb-2">
                        <div class="col d-flex align-items-center">
                            <img width="52px" class="rounded-circle" src="<?php echo $product['img_url'] ?>" />
                            <p class="m-2"><?php echo $product['name'] ?></p>
                        </div>
                        <div class="col">
                            <p>Rp. <?php echo number_format($product['price']) ?></p>
                        </div>
                    </div>
                  <?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col"><p><b>Shipping</b></p></div>
                    <div class="col"><p><b>10k to all over Indonesia</b></p></div>
                </div>
                <div class="row">
                    <div class="col"><p><b>Total</b></p></div>
                    <div class="col"><p><b>Rp. <?php echo number_format($sub_total + 10000); ?></b></p></div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <?php require('../components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>