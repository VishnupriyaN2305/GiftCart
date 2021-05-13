<?php

session_start();
include "dbConn.php";
$cart_id = $_GET['cart_id'];

mysqli_query($db,"delete from cart_details where cart_id=$cart_id"); 

 header("Location: cart_details.php");

?>
