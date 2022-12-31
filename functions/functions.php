<?php
$con = mysqli_connect("localhost","root","","ecommerce");

function getIp(){
    $ip = $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
      $ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	 elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     }
     
    return $ip;
	}
function cart(){
    if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'" ;
        $run_check = mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }
        else {
            $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
            $run_pro = mysqli_query($con,$insert_pro);
            echo "<script>window.open('index.php','self')</script>";
        }


    }
}
function total_items(){
	if(isset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
		$get_items = "select * from cart where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
	}
	else {
		global $con;
		$ip = getIp();
		$get_items = "select * from cart where ip_add = '$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
	}
	echo $count_items;
}
function total_price(){
	$total =0;
	global $con;
	$ip = getIp();
	$sel_price = "select * from cart where ip_add ='$ip'";
	$run_price = mysqli_query($con,$sel_price);
	while($p_price = mysqli_fetch_array($run_price)){
		$pro_id1 = $p_price['p_id'];
		$pro_price = "select * from product where productID = '$pro_id1' ";
		$run_pro_price = mysqli_query($con,$pro_price);
		while($pp_price = mysqli_fetch_array($run_pro_price)){
			$product_price = array($pp_price['productPrice']);
			//$producttitle = $pp_price['productTitle'];
			//$productimage = $pp_price['productImage'];
			//$single_price = $pp_price['productPrice'];
			$values = array_sum($product_price);
			$total += $values;
		}
	}
	echo "Tk " .$total;
}

/*function total_price(){
	$total = 0;
	global $con;
	$ip = getIp();
	$sel_price = "select * from cart where ip_add ='$ip'";
	$run_price = mysqli_query($con,$sel_price);
	while($p_price = mysqli_fetch_array($run_price)){
		$pro_id = $p_price['p_id'];
		$pro_price = "select * from product where productID = '$pro_id' ";
		$run_pro_price = mysqli_query($con,$pro_price);
		while($pp_price = mysqli_fetch_array($run_pro_price)){
			$product_price = array($pp_price['productPrice']);
			//$producttitle = $pp_price['productTitle'];
			//$productimage = $pp_price['productImage'];
			//$single_price = $pp_price['productPrice'];
			$values = array_sum($product_price);
			$total += $values;
		}
	}
	echo "$" .$total;
}*/
function getCats(){
	global $con;
	$getcats = "select * from categories";
	$runcats = mysqli_query($con,$getcats);
	while($rowcats = mysqli_fetch_array($runcats)){
		$catid = $rowcats['cat_id'];
		$cat_title = $rowcats['cat_title'];
		echo "
		<a class =$catid href='main.php?cat_id=$catid'>$cat_title</a>
		      
		     ";
	}
}
function getBrands(){
	global $con;
	$getbrands = "select * from brand";
	$runbrands = mysqli_query($con,$getbrands);
	while($rowbrands = mysqli_fetch_array($runbrands)){
		$brandid = $rowbrands['brand_id'];
		$brand_title = $rowbrands['brand_title'];
		echo "<a href='#'>$brand_title</a>";
	}
}
function getpro(){
	global $con;
	
	$get_pro = "select * from product order by RAND() LIMIT 0,4";
	$run_pro = mysqli_query($con,$get_pro);
	while($row_pro = mysqli_fetch_array($run_pro)){
		$productid = $row_pro['productID'];
		$productcat = $row_pro['productCat'];
		$producttitle = $row_pro['productTitle'];
		$productprice = $row_pro['productPrice'];
		$productdesc = $row_pro['productDesc'];
		$productimage = $row_pro['productImage'];
			echo "
			<div class='product'>
			<div class='images1'>
			<img class='pro-img' src='functions/product_images/$productimage' width='307px' height='500px'/>
			</div>
			<div class='addtocart'>
				<a href='product.php?pro_id=$productid'>Details</a>
				<a href='index.php?add_cart=$productid'>Add to Cart</a>
				</div>
				<div class='price'>
				 <p>$producttitle</p>
		         <p>Price :Tk $productprice</p>
				</div>
			</div>
		
		";
	}
	
}
function getallpro(){
	global $con;
	
	$get_pro = "select * from product";
	$run_pro = mysqli_query($con,$get_pro);
	while($row_pro = mysqli_fetch_array($run_pro)){
		$productid = $row_pro['productID'];
		$productcat = $row_pro['productCat'];
		$producttitle = $row_pro['productTitle'];
		$productprice = $row_pro['productPrice'];
		$productdesc = $row_pro['productDesc'];
		$productimage = $row_pro['productImage'];
			echo "
			<div class='product'>
			<div class='images1'>
			<img class='pro-img' src='functions/product_images/$productimage' width='307px' height='500px'/>
			</div>
			<div class='addtocart'>
				<a href='product.php?pro_id=$productid'>Details</a>
				<a href='product.php?pro_id=$productid'>Add to Cart</a>
				</div>
				<div class='price'>
				 <p>$producttitle</p>
		         <p>Price : Tk $productprice </p>
				</div>
			</div>
		
		";
	}
	
}

function getprobycat(){
	if(isset($_GET['cat_id'])){ 
		$cat_id =$_GET['cat_id'] ;
		global $con;
	
	$get_cat = "select * from product where productCat = '$cat_id' ";
	$run_cat = mysqli_query($con,$get_cat);
	while($row_pro = mysqli_fetch_array($run_cat)){
		$productid = $row_pro['productID'];
		$productcat = $row_pro['productCat'];
		$producttitle = $row_pro['productTitle'];
		$productprice = $row_pro['productPrice'];
		$productdesc = $row_pro['productDesc'];
		$productimage = $row_pro['productImage'];
			echo "
			
		<div class='product'>
			<div class='images1'>
			 <img src='functions/product_images/$productimage' />
			</div>
			<div class='addtocart'>
				<a href='product.php?pro_id=$productid'>Details</a>
				<a href='product.php?pro_id=$productid'>Add to Cart</a>
				</div>
				<div class='price'>
				 <p>$producttitle</p>
		         <p>Price :Tk $productprice</p>
				</div>
			</div>
		
		
		";
	}
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/shop-icon.png" type="image/x-icon">
	<title>Best Women Clothes In Bangladesh</title>
	<style>
		
		.product {
			display: flex;
			flex-direction: column;
			font-family: sans-serif;
			height: 600px;
			
		}

		.images1 {
			overflow: hidden;
			height: 600px;
			margin: 0 auto;
			width: 355px;
		}

		.images1 img {
			width: 100%;
			transition: 0.5s all ease-in-out;
		}

		.images1 img:hover {
			transform: scale(1.1);
		}

		.addtocart {
			display: flex;
			padding: 10px;
			background: #000;
			gap: 4rem;
			justify-content: center;
			align-items: center;
		}

		.addtocart a {
			font-size: larger;
			text-decoration: none;
			color: white;
		}

		.addtocart a:hover {
			padding: 0px 2px;
			border: 4px solid white;
			border-style: dotted;
		}
		.price{
			font-size: large;
		}
		
	</style>
</head>

<body>
    
</body>

</html>