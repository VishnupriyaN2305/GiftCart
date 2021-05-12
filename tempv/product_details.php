<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="imagedisplay.css" >
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
<title>GIFTCART</title>
</head>
<body>
<?php
session_start();
echo "hi " . $_SESSION['cust_name'] . "!";
$cust_id=$_SESSION['custid'];

$prod_id = $_GET['prod_id'];
include "dbConn.php";
$records = mysqli_query($db,"select * from products where prod_id=$prod_id"); // fetch data from database
$data = mysqli_fetch_array($records);

echo "Welcome to the member's area, " . $prod_id . "!";
echo "WELCOME TO PROD DETAILS";
?>
<input type="button" name="back" value="back" onclick="document.location.href='product.php'"><br>
<h1> <?php echo $data['prod_name']; ?></h1>
<div class="slideshow-container">
<?php 
    $i=1;
    while($i<=5) {
?>
    <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="<?php echo $data['pic'.$i]; ?>" style="width:100%">
    <div class="text">Caption Text</div>
    </div>
<?php 
    $i=$i+1;
    }
?>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 