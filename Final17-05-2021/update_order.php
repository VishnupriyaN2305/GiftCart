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

   
  
?>

<form action="update_order2.php" method="post">
  <label for="status">Choose a option</label>
  <select name="status" id="status">
    <option value="PLACED">PLACED</option>
    <option value="DISPATCHED">DISPATCHED</option>
    <option value="SHIPPED">SHIPPED</option>
    <option value="DELIVERED">DELIVERED</option>
  </select>
  <br><br>
  <input type="submit" name="Submit" value="Submit">
</form>


</body>
</html>