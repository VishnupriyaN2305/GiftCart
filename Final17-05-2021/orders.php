<!DOCTYPE html>
<html>
    <head>
<link rel="icon" href="images/g.png" type="image/png" sizes="16x16">      
        <title>GIFTCART</title>
    </head>
<body>

<?php
    session_start();
    $username = $_SESSION['username'];
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
  header("location: logout_msg.php");
}
?>
<input type="button" name="back" value="back" onclick="document.location.href='product.php'">
<input type="button" name="logout" value="logout" onclick="document.location.href='logout.php'">
<h2>Your Orders</h2>
<form method="get">
<table border="10">
  <tr>
    <th>Order ID</th>
    <th>Date</th>
    <th>Total Amount</th>
    <th>Status</th>
    <th>View order details</th>
  </tr>

<?php
    include "dbConn.php";
    $sql = "SELECT * FROM `customer` WHERE username='$username'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    $custid = $row["cust_id"];
    $records = mysqli_query($db,"select order_id,date,total,status from orders where cust_id=$custid");
    $count=mysqli_num_rows($records);
    if($count==0)
    {
        header("Location:emptyorders.php");
    }
    while($data = mysqli_fetch_array($records))
    {
    ?>
    <tr>
        <td><?php echo $data['order_id'];?></td>
        <td><?php echo $data['date']; ?></td>
        <td><?php echo $data['total']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td><a href="orderdetails.php?<?php echo 'id='.$data['order_id']; ?>">
        <div name='id'>View this order</div></a></td>
    </tr>
    <?php
    }
?>
    
</table>
</form>
<?php mysqli_close($db);?>
</body>
</html>