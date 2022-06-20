<?php
  $id=$_GET['id'];

  // $new_product = array(
  //   [
  //     'id_product' => $id,
  //     'name' => $name,
  //     'img_url' => $img_url,
  //     'desc' => $desc,
  //     'price' => $price,
  //     'stock' => $stock,
  //   ]
  // );

  if (isset($_COOKIE['products'])) {
    $products_cookie = json_decode($_COOKIE['products'], true);
    $new_products = array_filter($products_cookie, function($product) use ($id) {
      return ($product['id_product'] != $id);
    });
    setcookie('products', json_encode($new_products), time()+3600);
    // echo $new_product['id_product'];
    // foreach ($products_cookie as $product_cookie) {
    //   if ($product_cookie['id_product'] == $id){
    //     echo "id ketemu";
    //   } else {
    //     $products = array_merge($new_product, $products_cookie);
    //     setcookie('products', json_encode($products), time()+3600);
    //     echo "beda";
    //   }
    // }
  } else {
    setcookie('products', json_encode($new_product), time()+3600);
    echo "kosong";
  };

    // $newarray = array_filter($array, function($var) {
    //   return ($var != 'something');
    // });
    
?>