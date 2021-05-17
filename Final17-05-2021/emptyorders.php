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
echo "no orders placed"
?><br>
continue shoppingg...
<input type="button" name="back" value="back" onclick="document.location.href='product.php'"></body>
</html>