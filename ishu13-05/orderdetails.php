<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
    $username = $_SESSION['username'];
}
else {
    echo "Please log in first to see this page.";
}
if(isset($_GET['back'])) {
  header('Location:orders.php');
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
$order_id = $row["order_id"];
$_SESSION['order_id']=$order_id;
$records = mysqli_query($db,"SELECT order_id, date, total, status from orders where order_id=$order_id");
$data = mysqli_fetch_array($records);
if(isset($_GET['cancel'])) {
  if($data['status']=='PLACED') {
    $sq1 = "DELETE FROM `order_details` WHERE order_id=$order_id";
    $re = mysqli_query($db,$sq1);
    $sq2 = "DELETE FROM `orders` WHERE order_id=$order_id";
    $re = mysqli_query($db,$sq2);
    header("Location: orders.php");
  }
  else {
    echo "Cannot be cancelled as this order was already ".$data['status'];
  }
}
?>

<h2>Your Order Details</h2>
Order ID: <?php echo $data['order_id'];?><br>
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
    $sql = "SELECT * FROM `order_details` WHERE order_id=$order_id";
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
<button onclick="document.location.href='orders.php'">back</button>
</table><br><br>
<form action="orderdetails.php" method="get">
  <input type="submit" name="cancel" value="Cancel this order"><br>
  Orders can be cancelled only when its STATUS is PLACED.<br>
</form>
<?php mysqli_close($db);  // close connection ?>
</body>
</html>