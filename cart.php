<?php 
@include 'config.php';

if(isset($_POST['update_update_btn'])){
	$update_quantity = $_POST['update_quantity'];
	$update_id = $_POST['update_quantity_id'];
	
	$sql = "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'";
	$result = $conn->query($sql);
	if($result == true){
		 header("Location:cart.php");
	}
};
if(isset($_GET['remove'])){
	$remove_id = $_GET['remove'];
	$remove_sql = "DELETE FROM `cart` WHERE id = '$remove_id'";
	$remove_res = $conn->query($remove_sql);
	if($remove_res == true){
		header("Location:cart.php");
	}
};

if(isset($_GET['delete_all'])){
	$sql_dltall = "DELETE  FROM `cart`";
	$dlt_res = $conn->query($sql_dltall);
	if($dlt_res == true){
		header("Location:cart.php");
	}
}


?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>
<?php
    
			$cart_sql = "select * from cart ";
			$grand_total = 0;
			$res = $conn->query($cart_sql);
			if($res->num_rows > 0){
				while($row= $res -> fetch_assoc()){
						

?>	   

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>Rs.<?php echo $row['price']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $row['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
			<td><?php echo $sub_total =  number_format($row['price'] * $row['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>Rs.<?php echo $grand_total ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>