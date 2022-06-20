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
    $showProduct=$db->query("SELECT * FROM products");
  ?>

  <section>
      <div class="container p-5">
          <h1 class="text-center pb-3">Shop</h1>
          
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($showProduct as $product): ?>
                <div class="col">
                    <div class="card">
                        <a href="/detailProduct.php?id=<?php echo $product['id_product']?>">
                            <img src="<?php echo $product['img_url'] ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo substr_replace($product['name'], "...", 25) ?></h5>
                            <small class="card-text">Rp <?php echo number_format($product['price']) ?></small>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
          </div>

      </div>
  </section>

  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>