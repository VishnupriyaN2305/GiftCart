<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
</head>
<body>

<?php
if(isset($_POST['submit'])) 
{
    $username = $_POST['Username'];
    $password = $_POST['Password'];

        if($password == '1234' && $username== 'ishu') {
            session_start();
            $_SESSION['aloggedin'] = true;
            header("Location: adminpage.php");
        }
        else {
            echo "Invalid credentials";
        }
  
}
?>

    <h3>Fill the Form</h3>

    <form action="admin.php" method="POST">
        <label for="Username">Enter id: </label>
        <input type="text" placeholder="Enter username" name="Username"><br><br>
        <label for="Password">Enter password: </label>
        <input type="password" placeholder="Enter password" name="Password"><br><br>    
        <input type="submit" name="submit" value="Submit"><br>
</form>
</body>
</html>