<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Contact</title>
</head>
<body>
  <?php require('components/header.php'); ?>
  <section>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h1>Contact Us</h1>
                <p>Do you want to collaborate? If you have any problem on purchasing, please contact us!</p>
            </div>
            <div class="col">
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Subject">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
        
    </div>
  </section>
  <?php require('components/footer.php') ?>
</body>
</html>