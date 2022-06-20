<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Shop</title>
</head>
<body>
  <?php 
    require('components/header.php'); 
    require('./config/config.php');
    $id = $_GET['id'];
    $sql = $db->query("SELECT * FROM products WHERE id_product = '$id'");
    $product = $sql->fetch();
  ?>

  <section>
    <div class="container p-5">
      <div class="row mb-5">
        <div class="col-md-4 mb-3 d-flex justify-content-end">
          <img src="<?php echo $product['img_url'] ?>" class="rounded" alt="<?php echo $product['name'] ?>">
        </div>

        <div class="col">
          <h1><?php echo $product['name'] ?></h1>
          <h3>Rp <?php echo number_format($product['price']) ?></h3>
          <p>
            <?php echo $product['desc'] ?> 
          </p>
          <p>Stock : <b><?php echo $product['stock'] ?></b></p>
          <div class="d-grid gap-2">
            <form method="post">
              <button type="submit" name="btnSubmit" class="btn btn-outline-primary">
                ADD TO CART
              </button>
              <?php 
                if (isset($_POST["btnSubmit"])){
                  // "Save Changes" clicked
                  // echo "<script>alert('User Belum Terdaftar');</script>";
                  
                  $new_product = array(
                    [
                      'id_product' => $product['id_product'],
                      'name' => $product['name'],
                      'img_url' => $product['img_url'],
                      'desc' => $product['desc'],
                      'price' => $product['price'],
                      'stock' => $product['stock'],
                    ]
                  );
                
                  if (isset($_COOKIE['products'])) {
                    $products_cookie = json_decode($_COOKIE['products'], true);
                    // echo $new_product['id_product'];
                    foreach ($products_cookie as $product_cookie) {
                      if ($product_cookie['id_product'] === $id){
                        ?> 
                          <div class="alert alert-success mt-3" role="alert">
                            Produk sudah ada dikeranjang!
                          </div>
                        <?php
                      } else {
                        $products = array_merge($new_product, $products_cookie);
                        setcookie('products', json_encode($products), time()+3600);
                      }
                    }
                  } else {
                    setcookie('products', json_encode($new_product), time()+3600);
                  };
                }
              ?>
            </form>
          </div>
        </div>
      </div>

      <p class="text-muted">
        Note : bahan yang digunakan pada produk ini adalah bahan sisa industri karena CIRCULAR berkomitmen 
        untuk mendukung sustainability dan membantu mengurangi perubahan iklim (Climate Change).
      </p>
    </div>
  </section>

  <?php require('components/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>