<!DOCTYPE html>
<html>
<head>
  <title>GIFTCART</title>
  <link rel="icon" href="images/g.png" type="image/png" sizes="16x16">   
</head>
<body>

<h2>Products in cart</h2>

<?php
session_start();
include "dbConn.php";
$cust_id=$_SESSION['cust_id'];

$prodname=$_SESSION['prod_name'];
$records = mysqli_query($db,"select * from cart_details where cust_id=$cust_id"); 
$result = mysqli_query($db,"select * from products");
$count=mysqli_num_rows($records);

?>
<table border="2">
  <tr>
    <td>Product Name</td>
    <td>Cost</td>
    <td>Image Uploaded</td>
  </tr>
  <?php
 $i = 0;
while($i < $count) {
 $data = mysqli_fetch_array($records);
 $prod_id1=$data['prod_id'];
  $row = mysqli_fetch_assoc($result);
  if($prod_id1 == $row["prod_id"]) {
      session_start();
      $_SESSION['cost']=$row["cost"];
      $_SESSION['prodname']=$row["prod_name"];
      $cost=$_SESSION['cost'];
      $prodname=$_SESSION['prodname'];?>
  <tr>
  <td><?php echo "$prodname"; ?></td>
  <td><?php echo "$cost"; ?></td>
  <td><img src="<?php echo $data['image']; ?>" width="100" height="100">
  </tr>
  <?php }
}?>
</table>
</body>
</html>