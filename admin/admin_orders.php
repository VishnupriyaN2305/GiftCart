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
  header("Location:admin_logout_msg.php");
}
?>
<input type="button" name="back" value="back" onclick="document.location.href='adminpage.php'">
<input type="button" name="logout" value="logout" onclick="document.location.href='admin_logout.php'">
<h2>Your Orders</h2>

<table border="10">
  <tr>
    <th>Order ID</th>
    <th>Date</th>
    <th>Total Amount</th>
    <th>Status</th>
    
  </tr>

<?php
    include "dbConn.php";
    $records = mysqli_query($db,"select * from orders ");
    $count=mysqli_num_rows($records);
    if($count==0)
    {
      header("Location: adminpage.php");
    }
    while($data = mysqli_fetch_array($records))
    {
    ?>
    <tr>
        <td><?php echo $data['order_id'];?></td>
        <td><?php echo $data['date']; ?></td>
        <td><?php echo $data['total']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td><a href="admin_o_details.php?<?php echo 'id='.$data['order_id']; ?>">
        <div name='id'>View this order</div></a></td>
    </tr>
    <?php
    }
?>
    
</table>

<?php mysqli_close($db);?>
</body>
</html>