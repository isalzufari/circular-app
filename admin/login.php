<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('../components/head.php'); ?>
  <title>Login</title>
</head>
<body class="bg-light">
  <?php require('./components/header.php'); ?>
  <section class="text-center d-flex justify-content-center p-5">
    <form class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Sign in Administrator</h1>
      <label for="inputEmail" class="sr-only mb-2">Email address</label>
      <input type="email" name="inputEmail" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only mb-2">Password</label>
      <input type="password" name="inputPassword" class="form-control mb-3" placeholder="Password" required="">
      <button name="btnLogin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php
        require('../config/config.php');
        if(isset($_POST["btnLogin"])){
          $email = $_POST["inputEmail"];
          $password = $_POST["inputPassword"];
          $query = $db->prepare("SELECT * FROM users WHERE email = ? AND status_admin=1");
          $query->execute(array($email));
          $hasil = $query->fetch();
          if($query->rowCount() == 0) {
            echo "<script>alert('User Belum Terdaftar');</script>";
          } else {
            if($password <> $hasil['password']) {
              echo "<script>alert('Password Salah');</script>";
            } else {
              $_SESSION['status']="login";
              $_SESSION['nama_user'] = $hasil['nama'];
              $_SESSION['id_user'] = $hasil['id_user'];
              echo "<script>alert('Sukses Login');window.location.href='index.php';</script>";
            }
          }
         }
         ?>
    </form>
  </section>
  <?php require('../components/footer.php'); ?>
</body>
</html>