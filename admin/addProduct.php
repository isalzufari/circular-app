<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('../components/head.php'); ?>
  <title>Tambah Produk</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('../config/config.php');
  ?>
  
  <section class="container p-5">
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3">
                <h2 class="mb-3">Tambah</h2>
                <div class="col-12">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="inputName" >
                </div>
                <div class="col-12">
                    <label for="inputPhone" class="form-label">Gambar [URL]</label>
                    <input type="text" class="form-control" name="inputImg" >
                </div>
                <div class="col-12">
                    <label for="inputEmail" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" name="inputDesc" ></textarea>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="inputPrice" >
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="inputStock" >
                </div>
                <div class="col-12">
                    <button name="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
                <?php 
                    if (isset($_POST["btnSimpan"])) {
                        $name=$_POST["inputName"];
                        $image=$_POST["inputImg"];
                        $desc=$_POST["inputDesc"];
                        $price=$_POST["inputPrice"];
                        $stock=$_POST["inputStock"];

                        if (!$name || !$image || !$desc || !$price || !$stock) {
                            echo "<script>alert('Isi Semua Data!'); </script>";
                        } else {
                            $save = $db->exec("INSERT INTO 
                            products(`name`, img_url, `desc`, price, stock)
                            VALUES('$name','$image','$desc','$price','$stock')");
                            if ($save) {
                                echo "<script>alert('Data Barang Disimpan');</script>";
                            }
                        }
                    }
                ?>
            </form>
        </div>
    </div>  
  </section>

  <?php require('../components/footer.php'); ?>
</body>
</html>