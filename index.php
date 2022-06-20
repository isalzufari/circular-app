<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Home</title>
</head>
<body>
  <?php 
    require('components/header.php');
  ?>
  <div class="bg-light">
    <div class="container">
      <h1 class="display-4"><b>Fast Fashion</b> #SaveOurPlanet</h1>
      <h1>Solution, Let's Collaborate!</h1>
      <p class="lead">We produce limited and high quality fashion products from fashion waste!</p>
      <hr class="my-4">
      <p class="pb-3">Pieces of piece • Budi - Cerdikiawan</p>
    </div>
  </div>

  <section class="container mt-3">
    <h3 class="text-center py-3">Our Featured Product</h3>
    <div class="row row-cols-md-3">
      <div class="col">
        <div class="card h-100">
          <img src="https://i1.wp.com/percain.com/wp-content/uploads/2021/12/Thumbnail-ABT-scaled.jpg?resize=300%2C300&ssl=1" class="card-img-top" alt="...">
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i0.wp.com/percain.com/wp-content/uploads/2021/12/Thumbnail-AJBM.jpg?resize=300%2C300&ssl=1" class="card-img-top" alt="...">
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i2.wp.com/percain.com/wp-content/uploads/2021/12/20211129_215048-scaled.jpg?resize=300%2C300&ssl=1" class="card-img-top" alt="..."> 
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light mt-3">
    <div class="container py-5">
      <h1>Hurry Up!</h1>
      <h1>Save Our Planet Today!</h1>
      <p class="lead">Buy Detachable Collat at 30% Discount, Use Code <b>Today20</b></p>
      <a href="/shop.php" type="button" class="btn btn-outline-secondary btn-lg">SHOP NOW</a>
    </div>
  </section>

  <section>
    <div class="container py-5">
      <h5 class="display-5">Protecting Our Planet Starts with You</h5>
      <h3>Sustainable Development Goals, Let's Collaborate!</h3>
    </div>
  </section>

  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>