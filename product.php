<!DOCTYPE html>
<html>
<head>
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
<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Name</td>
    <td>Cost</td>
    <td>Image</td>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select prod_name,cost,pic1 from products"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['prod_name']; ?></td>
    <td><?php echo $data['cost']; ?></td>
    <td> <a href="https://www.w3schools.com/html/html_images.asp">
    <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> </td>
</a>
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($db);  // close connection ?>

</body>
</html>
