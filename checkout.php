<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Checkout</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('./config/config.php');
    $id = $_SESSION['id_user'];
    $sql_users = $db->query("SELECT * FROM `users` WHERE id_user = '$id'");
    $user = $sql_users->fetch();
    $sub_total = 0;
  ?>
  <section>
    <div class="container p-5">
             
        <div class="card">
            <div class="card-body">
            <form method="post" class="row g-3">
                <div class="row mt-3">
                    <div class="col">
                        <h2 class="mb-3">Billing details</h2>
                        <div class="col-12">
                            <label for="inputName" class="form-label">Fullname</label>
                            <input type="text" class="form-control" name="inputName" value="<?php echo $user['nama'] ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="inputPhone" value="<?php echo $user['no_telp'] ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="inputEmail" value="<?php echo $user['email'] ?>" disabled>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Street Address</label>
                            <input type="text" class="form-control" name="inputAddress" value="<?php echo $user['alamat'] ?>" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <h2 class="mb-3">Your order</h2>
                        <div class="row">
                            <div class="col"><p><b>Product</b></p></div>
                            <div class="col"><p><b>SubTotal</b></p></div>
                        </div>
                        <div>
                            <?php
                                if (isset($_COOKIE['products'])) {
                                  'Cart Kosong!';
                                  $products_cookie = json_decode($_COOKIE['products'], true);
                                  foreach($products_cookie as $product):
                                  $sub_total += $product['price'];
                            ?>
                                  <div class="row">
                                      <div class="col">
                                          <p><?php echo $product['name'] ?></p>
                                      </div>
                                      <div class="col">
                                          <p>Rp <?php echo number_format($product['price']) ?></p>
                                      </div>
                                  </div>
                            <?php
                                  endforeach; 
                                }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col"><p><b>Subtotal</b></p></div>
                            <div class="col"><p><b>Rp <?php echo number_format($sub_total) ?></b></p></div>
                        </div>
                        <div class="row">
                            <div class="col"><p><b>Shipping</b></p></div>
                            <div class="col"><p><b>10k to all over Indonesia</b></p></div>
                        </div>
                        <div class="row">
                            <div class="col"><p><b>Total</b></p></div>
                            <div class="col"><p><b>Rp <?php echo number_format($sub_total + 10000) ?></b></p></div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btnOrder">
                                ORDER
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                //   function saveUser($db, $inputName, $inputAddress, $inputEmail, $inputPhone) {
                //     $db->exec("INSERT INTO users(nama, alamat, email, no_telp) VALUES ('$inputName','$inputAddress','$inputEmail','$inputPhone')");
                //     return $db->lastInsertId();
                //   }

                //   function saveOrder($db, $id_user) {
                //     if (isset($_COOKIE['products'])) {
                //         $products_cookie = json_decode($_COOKIE['products'], true);
                //         foreach ($products_cookie as $product_cookie) {
                //           $id_product = $product_cookie['id_product'];
                //           $db->exec("INSERT INTO `order` (id_user, id_product, tgl_order, status_pembayaran) VALUES ('$id_user','$id_product',now(),'0')");
                //         }
                //         echo "
                //         <script>
                //           alert('Sukses Order');
                //           location.href = '/clearCart.php?id=$id_user';
                //         </script>";
                //     }
                //   };

                //   if (isset($_POST["btnOrder"])) {
                //     $inputName = $_POST["inputName"];
                //     $inputPhone = $_POST["inputPhone"];
                //     $inputEmail = $_POST["inputEmail"];
                //     $inputAddress = $_POST["inputAddress"];

                //     $query = $db->prepare("SELECT id_user FROM users WHERE email = ? OR no_telp = ?");
                //     $query->execute(array($inputEmail, $inputPhone));
                //     $user = $query->fetch();
                //     if ($query->rowCount()) {
                //       echo "Ada";
                //       $id_user = $user['id_user'];
                //       saveOrder($db, $id_user);
                //     } else {
                //       echo "Belum";
                //       $id_user = saveUser($db, $inputName, $inputAddress, $inputEmail, $inputPhone);
                //       saveOrder($db, $id_user);
                //     }    
                // }
                    if (isset($_POST["btnOrder"])) {
                        if (isset($_COOKIE['products'])) {
                            $products_cookie = json_decode($_COOKIE['products'], true);
                            foreach ($products_cookie as $product_cookie) {
                                $id_product = $product_cookie['id_product'];
                                $db->exec("INSERT INTO `order` (id_user, id_product, tgl_order, status_pembayaran) VALUES ('$id','$id_product',now(),'0')");
                            }
                            echo "
                            <script>
                                alert('Sukses Order');
                                location.href = '/clearCart.php';
                            </script>";
                        }
                    }
                ?>
            </form>
            </div>
        </div>
        
    </div>
  </section>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>