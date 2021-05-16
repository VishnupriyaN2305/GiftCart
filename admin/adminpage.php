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
    header("Location:admin_logout_msg.php");
  }
?>
<input type="button" name="Products" value="Products" onclick="document.location.href='admin_product.php'"><br>
<input type="button" name="Orders" value="Orders" onclick="document.location.href='admin_orders.php'"><br>
<input type="button" name="logout" value="logout" onclick="document.location.href='admin_logout.php'">

</body>
</html>
