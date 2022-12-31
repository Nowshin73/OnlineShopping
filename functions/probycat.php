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
			<img src='functions/product_images/$productimage' width='307px' height='500px'/>
			</div>
			<div class='addtocart'>
				<a href = 'details.php'>Details</a>
				<a href = '.php'>Add to Cart</a>
				</div>
				<div class='price'>
				 <p><b>$producttitle</b></p>
		         <p> <b>Price : $productprice</b></p>
				</div>
			</div>
		
		";
	}
	
}