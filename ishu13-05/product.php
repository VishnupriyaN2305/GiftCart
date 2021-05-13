<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16"> 
  <title>Gift Cart</title>
</head>
<body>

<?php

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
}
else {
    echo "Please log in first to see this page.";
}
?>
<input type="button" name="cart" value="cart" onclick="document.location.href='cart_details.php'"><br><br>
<input type="button" name="myorders" value="My orders" onclick="document.location.href='orders.php'"><br>
<h2>All Records</h2>
<form method="get">
<table border="2">
  <tr> <!--changed--> 
    <th>Name</th>
    <th>Cost</th>
    <th>Image</th>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select prod_id,prod_name,cost,pic1 from products"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['prod_name']; ?></td>
    <td><?php echo $data['cost']; ?></td>         <!-- THe whole row as a button??-->
    <td> <a href="product_details.php?prod_id=<?php echo $data['prod_id']?>">
    <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> </td>
</a>
  </tr>	
<?php
}
?>

</table>
</form>
  
<?php mysqli_close($db);  // close connection ?>

</body>
</html>