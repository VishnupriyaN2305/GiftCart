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
    $Name = $_POST['Name'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Confirm = $_POST['ConfirmPass'];
    $Address = $_POST['Address'];
    $Phonenumber = $_POST['Phonenumber'];
    if ($Password != $Confirm)
    {
        echo '<script>alert("Passwords Dont Match!")</script>';
    }
    else
    {
        $insert = mysqli_query($db,"INSERT INTO `customer`(cust_name, username, password, address, phno) VALUES ('$Name','$Username','$Password','$Address','$Phonenumber')");
        

        if(!$insert)
        {
         echo "FAILED!!";
         echo mysqli_error($db);
        }
        else
        {
            header("Location: redirect.php");
        }
    }
}

mysqli_close($db); // Close connection
?>

<h3>Fill the Form</h3>

<form method="POST">
    <label for="Name">Enter Name: </label>
    <input type="text" placeholder="Enter Name" name="Name" required><br><br>
    <label for="Username">Enter username: </label>
    <input type="text" placeholder="Enter username" name="Username" required><br><br>
    <label for="Password">Enter password: </label>
    <input type="password" placeholder="Enter password" name="Password" required><br><br>
    <label for="ConfirmPass">Re-enter password:</label>
    <input type="password" placeholder="Confirm password" name="ConfirmPass" required><br><br>
    <label for="Address">Enter Address: </label>
    <input type="textarea" placeholder="Enter address" name="Address" required><br><br>
    <label for="Phonenumber">Enter Phone number: </label> 
    <input type="text" placeholder="Enter phonenumber" name="Phonenumber" required><br><br>        
    <input type="submit" name="submit" value="Submit"><br>
</form>

</body>
</html>