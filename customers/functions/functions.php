<?php
$con = mysqli_connect("localhost","root","","ecommerce");
function getCats(){
	global $con;
	$getcats = "select * from categories";
	$runcats = mysqli_query($con,$getcats);
	while($rowcats = mysqli_fetch_array($runcats)){
		$catid = $rowcats['cat_id'];
		$cat_title = $rowcats['cat_title'];
		echo "<a class ='categories' href='#'>$cat_title</a>
		      <div class='dropdown-content'>
    </div>";
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
		$productbrand = $row_pro['productBrand'];
		$producttitle = $row_pro['productTitle'];
		$productprice = $row_pro['productPrice'];
		$productdesc = $row_pro['productDesc'];
		$productimage = $row_pro['productImage'];
			echo "
		<td><h3>$producttitle</h3>
		<img src='admin_area/product_images/$productimage' width='250px' height='250px'/>
		<h4> Price : $$productprice</h4>
		<a href = 'details.php'><button>Details</button></a>
		<a href = '.php'><button>Add to Cart</button></a></td>
		";
	}
	
}
?>