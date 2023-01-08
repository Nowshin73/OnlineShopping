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
  <link rel="shortcut icon" href="images/shop-icon.png" type="image/x-icon">
  <title>Best Women Clothes In Bangladesh</title>
 <link rel="stylesheet" href="CSS/product.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 .mySlides {
  display: none;
  gap: 2px;
  grid-template-columns: auto auto auto auto;
}
.mySlides img {vertical-align: middle;}
.related-products {
 display: flex;
 position: relative;
  gap: 1rem;
  align-items: center;
 
}

.content2 {
  display: flex;
  flex-direction: column;
  justify-items: center;
margin: 1rem 1rem 1rem 1rem;
}
/* Slideshow container */

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
 width: max-content;
 height: max-content;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background: gray;
}

/* Position the "next button" to the right */
.next {
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


</style>
</head>

<body>
  <!--header-->
  <div class="header">
    <div class="logo"><a href="index.php"><img src="images/shop-icon.png" alt="" width="200px"></a></div>
    <div class="cat">
      <?php getCats();?>
    </div>
  </div>
  <div class="content">
    <div class="content1">
      <?php  getproduct();?>
    </div>
  </div>
    <div class="content2">
      <h2 style="margin-left:3.7rem;">Related Products</h2>
      <div class='related-products'>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <div class="slideshow-container">
          <div class="mySlides fade">
            <?php getpro(); ?>
          </div> 
          <div class="mySlides fade">
            <?php getpro(); ?>
          </div> 
          <div class="mySlides fade">
            <?php getpro(); ?>
          </div>
        </div>
        <a class="next" onclick="plusSlides(1)">❯</a>
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
    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slides[slideIndex-1].style.display = "grid";  
     
    }
    </script>
    
</body>

</html>
<?php function getproduct(){
    if(isset($_GET['pro_id'])){ 
        $productid  =$_GET['pro_id'] ;
        global $con;
    $get_product = "select * from product where productID = '$productid' ";
    $run_product = mysqli_query($con,$get_product);
    while($row_pro = mysqli_fetch_array($run_product)){
        $productid = $row_pro['productID'];
        $productcat = $row_pro['productCat'];
        $producttitle = $row_pro['productTitle'];
        $productprice = $row_pro['productPrice'];
        $productdesc = $row_pro['productDesc'];
        $productimage = $row_pro['productImage'];
        $productkeywords = $row_pro['productKeywords'];
          $cat_id =$productcat ;
        $getcats = "select * from categories where cat_id = '$cat_id'";
        $runcats = mysqli_query($con,$getcats);
        while($rowcats = mysqli_fetch_array($runcats)){
          $catid = $rowcats['cat_id'];
          $cat_title = $rowcats['cat_title'];
         }
        
            echo "
            
        <div class='pro'>
            <div class='pro_img'>
             <img src='functions/product_images/$productimage' />
            </div>
            <div class='pro-details'>
              <div class='pro-title'>
                <span> $producttitle</span>
              </div>
                <div class='price'>
                 <h2>Tk $productprice</h2>
                </div>
                <div class='prodesc'>
                    <span>$productdesc</span>
                </div>
                <div class='add-cart'>
                  <button>-</button>
                  <span>1</span>
                  <button>+</button>
                  <button><i class='fa fa-shopping-cart' aria-hidden='true'></i> ADD TO CART</button>
                </div>
                <div class='fav'>
                  <button><i class='fa fa-heart-o' aria-hidden='true'></i>
                    Add to wishlist</button>
                </div>
                <hr>
                <div class='other-details'>
                  <span><b>Category:</b> $cat_title</span>
                  <span><b>Tag:</b> $productkeywords</span>
                </div>
            </div>
        </div>
        
        ";
    }
}
}
function getrelatedproduct(){
  if(isset($_GET['pro_id'])){ 
    $productid  =$_GET['pro_id'] ;
    global $con;
    $get_product = "select * from product";
    $run_product = mysqli_query($con,$get_product);
    while($row_pro = mysqli_fetch_array($run_product)){
      $productkeywords = $row_pro['productKeywords'];
      $get_relatedproduct = "select * from product where productKeywords = '$productkeywords'  ";
      $run_relatedproduct = mysqli_query($con,$get_relatedproduct);
       while($row_relpro = mysqli_fetch_array($run_relatedproduct)){
          $productid = $row_pro['productID'];
          $productcat = $row_pro['productCat'];
          $producttitle = $row_pro['productTitle'];
          $productprice = $row_pro['productPrice'];
          $productdesc = $row_pro['productDesc'];
          $productimage = $row_pro['productImage'];
       }
       $cat_id =$productcat ;
       $getcats = "select * from categories where cat_id = '$cat_id'";
       $runcats = mysqli_query($con,$getcats);
       while($rowcats = mysqli_fetch_array($runcats)){
         $catid = $rowcats['cat_id'];
         $cat_title = $rowcats['cat_title'];
        }
        echo "
        <div class='product'>
        <div class='images1'>
        <img src='functions/product_images/$productimage' width='307px' height='500px'/>
        </div>
        <div class='addtocart'>
          <a href='product.php?pro_id=$productid'>Details</a>
          <a href='product.php?pro_id=$productid'>Add to Cart</a>
          </div>
          <div class='price'>
          <p>$producttitle</p>
              <p>Price : $productprice</p>
              <div class='other-details'>
                <span><b>Category:</b> $cat_title</span>
                <span><b>Tag:</b> $productkeywords</span>
              </div>
          </div>
        </div>
      
      ";
  }
 }
}
?>