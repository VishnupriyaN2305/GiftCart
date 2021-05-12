<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
<title>GIFTCART</title>
</head>
<body>
<?php
@$name = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];
if (isset($name)) {
    if (!empty($name)) 
    {
    $location = 'uploaded/';
    if (move_uploaded_file($tmp_name, $location. $name));
    $filename= $location . $name;
    include "dbConn.php";
    session_start();
    $prod_id=$_SESSION['prod_id'];
    $cust_id=$_SESSION['cust_id'];
    mysqli_query($db,"INSERT INTO `cart_details` (cust_id,prod_id,image) values ('$cust_id','$prod_id','$filename')");
    header("Location: upload.php");
    }
    else 
    {
        echo 'Please choose a file';
    }
    
}
?> 

<form action="addtocart.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br><br>
<input type="submit" value="add to cart">
</form>
</body>
</html>