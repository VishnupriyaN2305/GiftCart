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
$cart_id = $_GET['cart_id'];
$_SESSION['cart_id'] =$cart_id;
?>


<form action="changeimage.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" ><br><br>
<input type="submit" value="submit">
</form>
</body>
</html>