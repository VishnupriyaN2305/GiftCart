<!DOCTYPE html>
<html>
<head>
  <title>GIFTCART</title>
  <link rel="icon" href="images/g.png" type="image/png" sizes="16x16">   
</head>
<body>

<h2>Products in cart</h2>

<table border="2">
  <tr>
    <th>Product Name</th>
    <th>Cost</th>
    <th>Image Uploaded</th>
  </tr>
  <?php
session_start();
include "dbConn.php";
$cust_id=$_SESSION['cust_id'];
$records = mysqli_query($db,"select * from cart_details where cust_id=$cust_id"); 
if(isset($_GET['placeorder'])) {
  //insert into order
  
  //insert into order_details
  //delete from cart
}
while($row = mysqli_fetch_assoc($records)) {
  $prod_id1=$row['prod_id'];
  $res = mysqli_query($db,"select * from products where prod_id=$prod_id1");
  $data = mysqli_fetch_assoc($res);
  $cost=$data["cost"];
  $prodname=$data["prod_name"];
  ?>
  <tr>
  <td><?php echo "$prodname"; ?></td>
  <td><?php echo "$cost"; ?></td>
  <td><img src="<?php echo $row['image']; ?>" width="100" height="100">
  </tr>
  <?php
}?>
</table>
<form action="cart_details.php" method="get">
<input type="submit" name="placeorder" value="Place Order"><br>
</form>
</body>
</html>
