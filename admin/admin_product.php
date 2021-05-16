<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">   
  <title>Gift Cart</title>
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
  header("Location:admin_logout_msg.php");
  }
?>
<input type="button" name="back" value="back" onclick="document.location.href='adminpage.php'">
<input type="button" name="logout" value="logout" onclick="document.location.href='admin_logout.php'">

<input type="button" name="add product" value="add product" onclick="document.location.href='add_product.php'">
<h2>All Records</h2>

<table border="2">
  <tr> <!--changed--> 
    <th>Name</th>
    <th>Cost</th>
    <th>Description</th>
    <th>pic1</th>
    <th>pic2</th>
    <th>pic3</th>
    <th>pic4</th>
    <th>pic5</th>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from products"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['prod_name']; ?></td>
    <td><?php echo $data['cost']; ?></td> 
    <td><?php echo "<pre>".  $data["description"] . "</pre>" ;?> </td>
    <td> <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> </td>
    <td> <img src="<?php echo $data['pic2']; ?>" width="100" height="100"> </td>
    <td> <img src="<?php echo $data['pic3']; ?>" width="100" height="100"> </td>
    <td> <img src="<?php echo $data['pic4']; ?>" width="100" height="100"> </td>
    <td> <img src="<?php echo $data['pic5']; ?>" width="100" height="100"> </td>
</a>
  </tr>	
<?php
}
?>

</table>

  
<?php mysqli_close($db);  // close connection ?>

</body>
</html>