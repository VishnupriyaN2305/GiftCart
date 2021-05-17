<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">      
  <title>GIFTCART</title>
</head>
<body>

<?php
include "dbConn.php"; // Using database connection file here

if(isset($_POST['submit']))
{
    include "dbConn.php";
    $Name = $_POST['Name'];
    $cost = $_POST['cost'];
    $description = $_POST['description'];
    $pic1="images/".$_POST['pic1'];
    $pic2="images/".$_POST['pic2'];
    $pic3="images/".$_POST['pic3'];
    $pic4="images/".$_POST['pic4'];
    $pic5="images/".$_POST['pic5'];
    $insert = mysqli_query($db,"INSERT INTO products(prod_name,cost,description,pic1,pic2,pic3,pic4,pic5) VALUES ('$Name','$cost','$description','$pic1','$pic2','$pic3','$pic4','$pic5')");

    if(!$insert)
    {
        echo "Error inserting";
    }
    else
    {
        header("Location: admin_product.php");
    }
    
}

mysqli_close($db); // Close connection
?>

<h3>Enter the details</h3>

<form method="POST">
    <label for="Name">Product Name</label>
    <input type="text"  name="Name" required><br><br>
    <label for="cost">Cost</label>
    <input type="text" name="cost" required><br><br>
    <label for="descritption">Description</label><br>
    <textarea name="description" rows="4" cols="50"></textarea><br><br>
    <label for="pic1">picture1 </label>
    <input type="file" name="pic1" required><br><br>
    <label for="pic2">picture2 </label>
    <input type="file" name="pic2" required ><br><br>
    <label for="pic3">picture3</label >
    <input type="file" name="pic3" required ><br><br>
    <label for="pic4">picture4</label>
    <input type="file" name="pic4" required><br><br>
    <label for="pic5">picture5</label>
    <input type="file" name="pic5" required><br><br>

    <input type="submit" name="submit" value="Submit"><br>
</form>

</body>
</html>