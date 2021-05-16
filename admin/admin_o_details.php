<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
    header("location: logout_msg.php");
  }
  if(isset($_GET['id'])) {
    $order_id=$_GET['id'];
  }
  else {
    $order_id=$_SESSION['order_id'];
  }
include "dbConn.php"; // Using database connection file here
$sql = "SELECT * FROM `orders` WHERE order_id=$order_id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['order_id']=$order_id;
$records = mysqli_query($db,"select * from orders as o INNER JOIN customer as c on c.cust_id=o.cust_id where o.order_id=$order_id"); 
$data = mysqli_fetch_array($records);

?>
<input type="button" name="back" value="back" onclick="document.location.href='admin_orders.php'">
<input type="button" name="Update order" value="Update order" onclick="document.location.href='Update_order.php'">

<h2>Order Details:</h2>
Order ID: <?php echo $data['order_id'];?><br>
Customer ID: <?php echo $data['cust_id'];?><br>
Customer name: <?php echo $data['cust_name'];?><br>
Address:<?php echo $data['address'];?><br>
Phone number:<?php echo $data['phno'];?><br>
Date: <?php echo $data['date'];?><br>
Total Amount: <?php echo $data['total']; ?><br>
Status: <?php echo $data['status']; ?><br><br>

<table border="10">
  <tr>
   
    <th>Product Name</th>
    <th>Cost</th>
    <th>Product Photo</th>
    <th>Your customized image</th>
  </tr>

  <?php
    $sql = "SELECT * FROM order_details WHERE order_id=$order_id";
    $result = mysqli_query($db,$sql);
    while($data = mysqli_fetch_assoc($result))
    {
      $prod_id=$data['prod_id'];
      $s = "SELECT * FROM `products` WHERE prod_id=$prod_id";
      $records = mysqli_query($db,$s);  
      $d = mysqli_fetch_assoc($records);
  ?>

    <tr>
        
        <td><?php echo $d['prod_name'];?></td>
        <td><?php echo $d['cost'];?></td>
        <td><a href="product_details.php?prod_id=<?php echo $d['prod_id']?>">
            <img src="<?php echo $d['pic1']; ?>" alt="Image" width="100" height="100">
          </a></td>
        <td>
          <img src="<?php echo $data['image']; ?>" alt="Image" width="100" height="100">
        </td>
    </tr>

  <?php
    }
  ?>
</table><br><br>




<?php mysqli_close($db);  // close connection ?>
</body>
</html>