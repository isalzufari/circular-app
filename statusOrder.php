<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Order</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('./config/config.php');
    $id = $_SESSION['id_user'];
    $sub_total = 0;
    $sql = $db->query("SELECT * FROM `users` 
    INNER JOIN `order` ON `order`.id_user = users.id_user
    WHERE `order`.id_user = '$id'");

    $orderStatus = $sql->fetch();
  ?>
  <section>
    <div class="container p-5">
        <h2 class="mb-3">Status order</h2>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mb-3">
                        <h2><?php echo $orderStatus['nama'] ?> <h6 class="text-muted"><?php echo $orderStatus['email'] ?></h6></h2>
                        <small class="text-muted"><?php echo $orderStatus['alamat'] ?></small>
                    </div>
                    <div class="col">
                        <h2 class="text-center rounded-pill bg-success text-white p-2 m-3">PAY<?php echo $orderStatus['no_telp']?>CIRCULAR</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p><b>Produk</b></p></div>
                    <div class="col"><p><b>SubTotal</b></p></div>
                </div>
                <div>
                  <?php
                    $products = $db->query("SELECT * FROM `users` 
                    INNER JOIN `order` ON `order`.id_user = users.id_user
                    INNER JOIN `products` ON products.id_product = `order`.id_product WHERE `order`.id_user = '$id'");
                    foreach($products as $product):

                    if ("$product[status_pembayaran]" == 0) {
                        echo "<script>location.href = '/config/verifyCheck.php?id=$id'; alert('Anda belum bayar!');</script>;";
                    }

                    $sub_total += $product['price'];
                  ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="<?php echo $product['img_url'] ?>" width="52px" class="rounded-circle" alt="<?php echo $product['name'] ?>">
                                            </div>
                                            <div class="col">
                                                <a href="./detailProduct.php?id=<?php echo $product['id_product'] ?>"><?php echo $product['name'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Rp. <?php echo number_format($product['price']) ?></p>
                                    </div>
                                    
                                </div>
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
                <h4 class="d-flex justify-content-center">Status</h4>
                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                </div>
            </div>
        </div>
    </div>
  </section>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>