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
    echo "Heyy ".$_SESSION['cust_name']."!";
    $cust_id=$_SESSION['custid'];

    $prod_id = $_GET['prod_id'];
    $_SESSION['prod_id']=$prod_id;
    include "dbConn.php";
    $records = mysqli_query($db,"select * from products where prod_id=$prod_id"); // fetch data from database
    $data = mysqli_fetch_array($records);
  ?>

  <input type="button" name="back" value="back" onclick="document.location.href='product.php'"><br>
  <h1> <?php echo $data['prod_name']; ?></h1>
  <div class="slideshow-container">
    <?php 
        $i=1;
        while($i<=5) {
    ?>
    <div class="mySlides fade">
      <div class="numbertext"><?php echo $i ?> / 5</div>
      <img src="<?php echo $data['pic'.$i]; ?>" style="width:100%">
    </div>
    <?php 
      $i=$i+1;
      }
    ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>

<input type="button" name="add to cart" value="add to cart" onclick="document.location.href='addtocart.php'"><br>
<div>
  <h4> COST </h4>
  <?php echo $data["cost"] ;?>
</div>
<div>
  <h4> description </h4>
  <?php echo "<pre>".  $data["description"] . "</pre>" ;?>
      
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