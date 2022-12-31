<!DOCTYPE html>
<?php
include("functions/functions.php");
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/shop-icon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Best Women Clothes In Bangladesh</title>
  <style>
    body {
      font-family: Georgia, Times, 'Times New Roman', serif;
      margin: 0 0 0 0;
    }

    .header {
      position: sticky;
      top: 0;
      left: 0;
      display: flex;
      justify-items: center;
      align-items: center;
      gap: 5rem;
      justify-content: center;
      padding-top: 10px;
      padding-bottom: 10px;
      box-shadow: 2px 6px 20px gray;
      background: white;
      z-index: 2;
    }

    .cat {
      display: flex;
      gap: 2rem;
    }

    .cat a {
      font-size: larger;
      text-decoration: none;
      color: rgb(32, 31, 31);
    }

    .cat a:hover {
      text-decoration: underline;
      color: black;
    }

    .slidebar {
      z-index: 1;
      flex: 1;
      position: sticky;
      top: 7rem;
      left: 0;
      display: flex;
      flex-direction: column;
      margin-left: 0px;
      padding: 3rem 3rem;
      height: 70vh;
      overflow-x: hidden;
      gap: 2rem;
      background: linear-gradient(90deg,#ba1111bd, #88c4df);
     
    }

    .slidebar a {
      font-size: larger;
      text-decoration: none;
      color: white;
      padding: 5px 10px;
    }

    .slidebar a:hover {
      text-decoration: none;
      background:linear-gradient(90deg,#3887ac , #88c4df);
      padding: 1rem 2rem;
    }


    .content {
      display: flex;
      z-index: -1;
    }

    .content1 {
      z-index: 1;
      flex: 4;
      padding: 2rem 2rem;
      display: grid;
      grid-template-columns: auto auto auto;
      gap: 3rem;
      background:#dfdfdf;
    }

    .footer {
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      background:linear-gradient(90deg,#3887ac , #88c4df);
      bottom: 0;
      padding: 20px;
    }

    .footelements {
      display: flex;
      gap: 20rem;
    }

    .footelements a {
      color: white;
    }



    #customercare {
      display: flex;
      flex-direction: column;

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
    <div class="slidebar">
      <?php getCats();?>
    </div>
    <div class="content1">
      <?php getprobycat(); ?>
      <?php getallpro(); ?>
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

</body>

</html>