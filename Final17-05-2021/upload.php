<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.png" type="image/png" sizes="16x16">      
  <title>GIFTCART</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
  header("location: logout_msg.php");
}
?>
added to cart
<input type="button" name="continue shopping" value="continue shopping" onclick="document.location.href='product.php'"><br>
</body>
</html>