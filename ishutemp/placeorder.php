<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
</head>
<body>
<?php 
session_start();
$cost=$_SESSION['cost']; 
include "dbConn.php";
$cust_id=$_SESSION['cust_id'];
$date = date('Y-m-d H:i:s');
$result = mysqli_query($db,"select * from cart_details where cust_id=$cust_id"); 
$count=mysqli_num_rows($result);
if ($count==0)
{
    header("Location: emptycart.php");
    
}
$insert = mysqli_query($db,"INSERT INTO `orders`( cust_id,date,total_cost,status) VALUES ('$cust_id','$date','$cost','ORDER PLACED')");
$lastid = mysqli_insert_id($db); 

while($row = mysqli_fetch_array($result))
{
    $prod_id=$row['prod_id'];
    $filename=$row['image'];
    $insert2=mysqli_query($db,"INSERT INTO `order_details` (order_id,product_id,image) values ('$lastid','$prod_id','$filename')");
    
} 
mysqli_query($db,"delete from cart_details where cust_id=$cust_id"); 
echo "order sucessfully placed";
?>

continue shoppingg...
<input type="button" name="continue shopping" value="continue shopping" onclick="document.location.href='product.php'">
</body>
</html>



