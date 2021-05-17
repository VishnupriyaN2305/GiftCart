<!DOCTYPE html>
<html>
<head>
  <title>GIFTCART</title>
<link rel="icon" href="images/g.png" type="image/png" sizes="16x16">   
</head>
<body>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo "Hello " . $_SESSION['cust_name'] . "!";
}

else {
header("location: logout_msg.php");
} 

include "dbConn.php";
$cust_id=$_SESSION['cust_id'];
$result = mysqli_query($db,"select c.cart_id,p.prod_id,p.prod_name,p.cost,c.image from `cart_details` as c INNER JOIN `products` as p on p.prod_id=c.prod_id where c.cust_id=$cust_id"); 
$count=mysqli_num_rows($result);
if ($count==0)
{
    header("Location: emptycart.php");
}
?>

<input type="button" name="logout" value="logout" onclick="document.location.href='logout.php'">
<input type="button" name="back" value="back" onclick="document.location.href='product.php'">
<h2>Products in cart</h2>
<table border="2">
  <tr>
    <td>Product Name</td>
    <td>Cost</td>
    <td>Image Uploaded</td>
  </tr>
<?php
$cost=0;
while($row = mysqli_fetch_array($result))
{
?>
  <tr>
  <td><?php echo $row['prod_name']; ?></td>
  <td><?php echo $row['cost']; ?></td>
  <td><img src="<?php echo $row['image']; ?>" width="100" height="100">
  <td>
  <a href="changeimage1.php?cart_id=<?php echo $row['cart_id']?>">
 change image</a>
    </td>
</td>
  <td> <a href="deleteitem.php?cart_id=<?php echo $row['cart_id']?>">
    <img src="images/delete.png" width="20" height="20"> </a>
    </td>
  </tr>
  <?php $cost=$cost + $row['cost']; ?>
<?php
} 
?>
</table>
<?php
echo "total cost= " .$cost;
$_SESSION['cost']=$cost;
?>
<input type="button" name="place order" value="place order" onclick="document.location.href='placeorder.php'"><br>


</body>
</html>