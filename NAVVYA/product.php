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

    echo "Welcome to the products's area, " . $_SESSION['cust_name'] . "!";
    
  }
else {
    echo "Please log in first to see this page.";
}
?>

<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Name</td>
    <td>Cost</td>
    <td>Image</td>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from products"); // fetch data from database
$cust_id=$_SESSION['custid'];
?>
<?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>
  
  <?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>
 
<?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>

<?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>

<?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>

<?php $data = mysqli_fetch_array($records); ?>

<tr>
  <td><?php echo $data['prod_name']; ?></td>
  <td><?php echo $data['cost']; ?></td>
  <td> <a href="prod_details.php?prod_id=<?php echo $data['prod_id'] ?>" > 
        <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> 
        </a> 
  </td>
  </td>
</tr>
</table>

<a href="cart_details.php?cust_id=<?php echo $cust_id ?>" > 
        <img  alt="IMAGE" src="images/cart.jpeg" width="45" height="45"> </a>  
<?php mysqli_close($db);  // close connection ?>
</body>
</html>