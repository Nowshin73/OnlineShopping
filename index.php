<!DOCTYPE html>
<?php
include("functions/functions.php");
include("functions/conn.php");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <link rel="shortcut icon" href="images/shop-icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Best Women Clothes In Bangladesh</title>
  
</head>

<body>
  <!--header-->
  <div class="header" id="Header">
    <div class="logo"><a href="index.php"><img src="images/shop-icon.png" alt="" width="200px"></a></div>
    <div class="cat" id="category">
      <?php getCats();?>
    </div>
    <div class="cat1">
      <a href="javascript:void(0);" class="icon" onclick="hamburger()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>
  <div class="heading">
    <p> Women's Traditional Pakistani Dresses</p>
  </div>
  <div class="cart">
    <h1>total Items: <?php total_items();?></h1>
    <h1>Cart: <?php cart();?></h1>
    <h1>total price: <?php total_price(); ?> </h1>
  </div>
  <div class="content1">
    <div class="promo1">
      <img src="images/m3-PhotoRoom2.png" alt="cloth1">
    </div>
    <div class="rightslider">
      <div id="headline1">
        Get the best women designer clothes
      </div>
      <div class="button1"> <a href="main.php"><button>Explore Now</button></a>
        <a href="main.php"><button>Discover More</button></a>
      </div>
    </div>
  </div>
  <div class="content2">
    <div id="heading2">
      Shop by Category
    </div>
    <div class="grid1">
      <a href='main.php?cat_id=6'><div class="promo2">
        <div class="images"><img src="images/OIP.jpg" alt=""></div>
        <div class="headline2">
          <p> Unstitched</p>
        </div>

      </div></a>
      <a href="main.php?cat_id=7"><div class="promo2">
        <div class="images"><img src="images/m5.jpg" alt=""></div>
        <div class="headline2">
          <p> Semistitched</p>
        </div>
        <div class="button1"></div>
      </div>
      </a>
      <a href="main.php?cat_id=9"><div class="promo2">
        <div class="images"><img src="images/m2.jpg" alt=""></div>
        <div class="headline2">
          <p>Ready To Wear</p>
        </div>
        <div class="button1"></div>
      </div>
      </a>
    </div>
  </div>
  <div class="content3">
    <div id="heading2">
      <span>Best Quality Products </span>
     </div>
    <div class="c3-container">
      <div class="c3-left">
        <a href="main.php"><img src="images/readymade/c31.jpg" alt=""></a>
      </div>
      <div class="c3-right">
        <div class="c3-upright">
       <a href="main.php"><img src="images/readymade/c32.jpg" alt=""></a>
      </div>
      <div class="c3-upright">
        <a href="main.php"><img src="images/readymade/c33.jpg" alt=""></a>
      </div>
     
      </div>
    </div>
  </div>
  <div class="content4">
    <div id="heading2">
     <span>Featured Products</span>
    </div>
    <div class="sildes-container">
      <div class="myslides"><?php getpro(); ?></div>  
      <div class="myslides"><?php getpro(); ?></div>  
      <div class="myslides"><?php getpro(); ?></div>  
    </div>
  </div>
 
  <div class="footer">
    <div class="footelements">
      <div id="contact">
        <h2>Contact</h2>
        <p>Email: info@nowshinonlinestore.com</p>
      </div>
      <div id="about">
        <h2>Information</h2>
        <a href="">About Us</a>
      </div>
      <div id="customercare">
        <h2>Customer Care</h2>
        <a href="">FAQ</a>
        <a href="">Contact Us</a>
      </div>
    </div>
    <div id="cp">
      <p>© Copyright 2022 Nowshin's Online Store All Rights Reserved.</p>
    </div>
  </div>
  
<script>
  let slideIndex = 0;
  showSlides();
  
  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("myslides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "grid";  
  
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
  showimg();
  function showimg(){
    let i;
    let slides = document.getElementsByClassName("c3-upright");
    for (i = 0; i <= 1; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
  
    setTimeout(showimg, 1500); // Change image every 2 seconds
  }
  function hamburger() {
   
  let x = document.getElementsByClassName("Header");
  if (x.className === "header") {
      x[0].style.display = "grid";
  } else {
    x.className = "cat";
  }
}
  </script>
</body>
</html>