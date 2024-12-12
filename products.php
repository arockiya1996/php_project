<?php
@include 'config.php';

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    // Check if the product is already in the cart
    $sql = "SELECT * FROM cart WHERE name = '$product_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $message[] = 'Product already added to cart';
    } else {
        // Insert the product into the cart
        $insert_sql = "INSERT INTO `cart`(name, price, image, quantity,created_by) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','1')";
        if ($conn->query($insert_sql)) {
            $message[] = "Product added to cart successfully";
        } else {
            $message[] = "Error adding product to cart";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Font Awesome CDN Link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS File Link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
if (isset($message)) {
   foreach ($message as $msg) {
      echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}
?>

<?php include 'header.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">Latest Products</h1>

   <div class="box-container">
   <?php
      // Query to fetch all products
      $product_sql = "SELECT * FROM products";
      $result = $conn->query($product_sql);

      if ($result) {
         // Loop through all products
         while ($row = $result->fetch_assoc()) {
   ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="">
            <h3><?php echo $row['product_name']; ?></h3>
            <div class="price"><?php echo 'Rs.' . $row['product_price']; ?></div>

            <!-- Hidden inputs for product details -->
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">

            <!-- Submit button to add the product to the cart -->
            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
         </div>
      </form>

   <?php
         }
      } 
   ?>

   </div>

</section>

</div>

<!-- Custom JS File Link  -->
<script src="js/script.js"></script>

</body>
</html>
