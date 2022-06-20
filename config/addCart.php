<?php
  $id=$_GET['id'];
  $name=$_GET['name'];
  $img_url=$_GET['img'];
  $desc=$_GET['desc'];
  $price=$_GET['price'];
  $stock=$_GET['stock'];

  $new_product = array(
    [
      'id_product' => $id,
      'name' => $name,
      'img_url' => $img_url,
      'desc' => $desc,
      'price' => $price,
      'stock' => $stock,
    ]
  );

  // if (isset($_COOKIE['products'])) {
  //   $products_cookie = json_decode($_COOKIE['products'], true);
  //   // echo $new_product['id_product'];
  //   foreach ($products_cookie as $product_cookie) {
  //     if ($product_cookie['id_product'] == $id){
  //       echo "sama";
  //       return false;
  //     } else {
  //       $products = array_merge($new_product, $products_cookie);
  //       setcookie('products', json_encode($products), time()+3600);
  //       echo "beda";
  //     }
  //   }
  // } else {
  //   setcookie('products', json_encode($new_product), time()+3600);
  //   echo "kosong";
  // };

  // $new_product = array(
  //   [
  //     'id_product' => $product['id_product'],
  //     'name' => $product['name'],
  //     'img_url' => $product['img_url'],
  //     'desc' => $product['desc'],
  //     'price' => $product['price'],
  //     'stock' => $product['stock'],
  //   ]
  // );

  if (isset($_COOKIE['products'])) {
    $products_cookie = json_decode($_COOKIE['products'], true);
    // echo $new_product['id_product'];
    foreach ($products_cookie as $product_cookie) {
      if ($product_cookie['id_product'] === $id){
        echo "item sudah ada di cookie";
      } else {
        $products = array_merge($new_product, $products_cookie);
        setcookie('products', json_encode($products), time()+3600);
        echo "item belum ada di cookie dan gabung ke item lain";
      }
    }
  } else {
    setcookie('products', json_encode($new_product), time()+3600);
    echo "membuat cookie dan tersimpan di cookie";
  };
?>