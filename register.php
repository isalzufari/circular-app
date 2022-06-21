<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('components/head.php'); ?>
  <title>Register</title>
</head>
<body class="bg-light">
  <?php require('components/header.php'); ?>
  <section class="text-center d-flex justify-content-center p-5">
    <form class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Register</h1>
      <label for="inputNama" class="sr-only mb-2">Nama Lengkap</label>
      <input type="text" name="inputNama" class="form-control mb-3" placeholder="Nama Lengkap" required>
      <label for="inputEmail" class="sr-only mb-2">Email address</label>
      <input type="email" name="inputEmail" class="form-control mb-3" placeholder="Email address" required>
      <label for="inputPassword" class="sr-only mb-2">Password</label>
      <input type="password" name="inputPassword" class="form-control mb-3" placeholder="Password" required>
      <label for="inputNoTelp" class="sr-only mb-2">Nomor Telepon</label>
      <input type="number" name="inputNoTelp" class="form-control mb-3" placeholder="No Telepon" required>
      <label for="inputAlamat" class="sr-only mb-2">Alamat</label>
      <textarea type="text" name="inputAlamat" class="form-control mb-3" required></textarea>
      <button name="btnRegis" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <?php
        require('./config/config.php');
        if(isset($_POST["btnRegis"])){
          $nama=$_POST["inputNama"];
          $email=$_POST["inputEmail"];
          $password=$_POST["inputPassword"];
          $telp=$_POST["inputNoTelp"];
          $alamat=$_POST["inputAlamat"];
      
          $query = $db->prepare("SELECT * FROM users WHERE email = ?");
          $query->execute(array($username));
          if($query->rowCount() != 0) {
            echo "<script>alert('User sudah terdaftar');</script>";
          } else {
            $simpan = $db->exec("INSERT INTO users(nama, alamat, email, password, no_telp)VALUES('$nama','$alamat','$email','$password','$telp')");
            if($simpan>0){
              echo "<script>alert('Berhasil register');window.location.href='login.php';</script>";
            }
          }
        }
      ?>
    </form>
  </section>
  <?php require('components/footer.php'); ?>
</body>
</html>