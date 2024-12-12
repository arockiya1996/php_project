<?php 
  @include 'config.php';
  
  if(isset($_POST['order_btn'])){
	  
	  $name = $_POST['name'];
	  $mobile = $_POST['number'];
	  $email = $_POST['email'];
	  $method = $_POST['method'];
	  $flat = $_POST['flat'];
	  $street = $_POST['street'];
	  $city = $_POST['city'];
	  $state = $_POST['state'];
	  $country = $_POST['country'];
	  $pincode= $_POST['pin_code'];
	  
	  $sql_cart = "select * from cart";
	  $price_total = 0;
	  $res_cart = $conn->query($sql_cart);
	  if($res_cart->num_rows >0){
		  while($item_row = $res_cart->fetch_assoc()){
			  $product_name[] = $item_row['name'] .'('.$item_row['quantity'] .') ';
			  $product_price = number_format($item_row['price'] * $item_row['quantity']);
			  $price_total += $product_price;
		  };
			  
	  };
	  
	
	  
	  
	  $total_product = implode(', ' ,$product_name);
	  $order_sql = "INSERT INTO `order`( `name`, `number`, `email`, `pay_type`, `flat`, `Street`, `city`, `state`, `country`, `pincode`, `total_products`, `total_price`, `Created_by`) VALUES ('$name','$mobile','$email','$method','$flat','$street','$city','$state','$country','$pincode','$total_product','$price_total','1')";
	  $order_res = $conn->query($order_sql);
	  if($sql_cart && $order_sql){
		   echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$mobile."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
	  }
	  
	  
  }
 ?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">
 
   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>
 

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
			
            <select name="method">
			<option>select Pay type</option>
			<?php
			
			 $sql_addon = "SELECT addon_id ,addon_name from tbl_addons WHERE addon_type = 'pay_method'";
			 $add_res = $conn->query( $sql_addon);
			 if( $add_res -> num_rows > 0){
				 while($row =$add_res -> fetch_assoc() ){
			?>
               <option value="<?php echo $row['addon_name']; ?>"><?php echo $row['addon_name']; ?></option>
              			 <?php 
			   	 }
			 }
?>
			  
            </select>

         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <select name="city">
			<option>select city</option>
			<?php
			
			 $sql_addon = "SELECT addon_id ,addon_name from tbl_addons WHERE addon_type = 'city'";
			 $add_res = $conn->query( $sql_addon);
			 if( $add_res -> num_rows > 0){
				 while($row =$add_res -> fetch_assoc() ){
			?>
               <option value="<?php echo $row['addon_name']; ?>"><?php echo $row['addon_name']; ?></option>
              			 <?php 
			   	 }
			 }
?>
			  
            </select>
         </div>
         <div class="inputBox">
            <span>state</span>
            <select name="state">
			<option>select state</option>
			<?php
			
			 $sql_addon = "SELECT addon_id ,addon_name from tbl_addons WHERE addon_type = 'state'";
			 $add_res = $conn->query( $sql_addon);
			 if( $add_res -> num_rows > 0){
				 while($row =$add_res -> fetch_assoc() ){
			?>
               <option value="<?php echo $row['addon_name']; ?>"><?php echo $row['addon_name']; ?></option>
              			 <?php 
			   	 }
			 }
?>
			  
            </select>
         </div>
         <div class="inputBox">
            <span>country</span>
            <select name="country">
			<option>select country</option>
			<?php
			
			 $sql_addon = "SELECT addon_id ,addon_name from tbl_addons WHERE addon_type = 'country'";
			 $add_res = $conn->query( $sql_addon);
			 if( $add_res -> num_rows > 0){
				 while($row =$add_res -> fetch_assoc() ){
			?>
               <option value="<?php echo $row['addon_name']; ?>"><?php echo $row['addon_name']; ?></option>
              			 <?php 
			   	 }
			 }
?>
			  
            </select>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>