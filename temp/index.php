<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
</head>
<body>

<?php
include "dbConn.php"; // Using database connection file here
if(isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // To protect MySQL injection (more detail about MySQL injection)
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($db,$username);
    $password = mysqli_real_escape_string($db,$password);
    $sql = "SELECT * FROM `customer` WHERE username='$username'";
    $result = mysqli_query($db,$sql);

    // Mysql_num_row is counting the table rows
    $count=mysqli_num_rows($result);
    // If the result matched $username and $password, the table row must be one row
    if($count > 0){
        //fetch associate array of the tuple in $result into $row
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['cust_name'] = $row["cust_name"];
            $_SESSION['custid']= $row["cust_id"];
            header("Location: product.php");
        }
        else {
            echo "Incorrect Password";
        }
    }
    else {
        echo "Incorrect username";      
    }
}

mysqli_close($db); // Close connection
?>

<h3>Fill the Form</h3>

<form action="index.php" method="POST">
    <label for="Username">Enter username: </label>
    <input type="text" placeholder="Enter username" name="Username"><br><br>
    <label for="Password">Enter password: </label>
    <input type="password" placeholder="Enter password" name="Password"><br><br>    
    <input type="submit" name="submit" value="Submit"><br>
</form>
    Not a registered user?<a href="register.php">Sign up</a>
</body>
</html>
