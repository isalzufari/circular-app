<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Cart</title>
</head>
<body>
  <?php 
    require('components/header.php'); 
    $sub_total = 0;
    $emptyInCart = 0;
  ?>
  <section>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-3">Belanjaan</h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <form method="post">
                            <button type="submit" name="btnClearCart" class="btn btn-outline-warning">
                                Hapus Semua
                            </button>
                            <?php 
                                if (isset($_POST["btnClearCart"])){
                                    setcookie('products','', time()-3600);
                                    header('Refresh:0');
                                    die();
                                }
                            ?>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php
                      if (isset($_COOKIE['products'])) {
                        $emptyInCart += 1;
                        $products_cookie = json_decode($_COOKIE['products'], true);
                        foreach($products_cookie as $product):
                        $sub_total += $product['price'];
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
                                            <!-- <form method="post">
                                                <button name="btnDelete" type="submit" class="btn btn-danger ml-2">Hapus</button>
                                                <?php
                                                    // if (isset($_POST["btnDelete"])){
                                                    //     $id_deleted = $product['id_product'];
                                                    //     $products_cookie = json_decode($_COOKIE['products'], true);
                                                    //     $new_products = array_filter($products_cookie, function($product) use ($id_deleted) {
                                                    //     return ($product['id_product'] != $id_deleted);
                                                    //     });
                                                    //     setcookie('products', json_encode($new_products), time()+3600);
                                                    //     header('Refresh:0');
                                                    // }
                                                ?>
                                            </form> -->
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
            <div class="col">
                <h2 class="mb-3">Total Belanjaan</h2>
                <div class="card">
                    <div class="card-body">
                        <p><b>Sub Total Rp. <?php echo number_format($sub_total); ?></b></p>
                        <p><b>Total : Rp. <?php echo number_format($sub_total); ?></b></p>
                        <div class="d-grid gap-2">
                            <?php 
                                if ($emptyInCart == 0) {
                                    ?> <a href="/shop.php" class="btn btn-primary" type="button">BELANJA SEKARANG!</a> <?php
                                } else {
                                    ?> <a href="/checkout.php" class="btn btn-primary" type="button">PROSES KE PEMBAYARAN</a> <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  </section>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>