<!DOCTYPE>
<?php
$con = mysqli_connect("localhost","root","","ecommerce");
?>
<html>
<head> 
<title>Insert products</title>
<style>

</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<form action = "insertproducts.php" method = "post" enctype ="multipart/form-data">
<table>
<tr>
<td><b>Product Title</b></td>
<td><input type = "text" name = "productTitle"></input></td>
</tr>
<tr>
<td><b>Product Category</b></td>
<td><select name ="productCat"><option>Select a category</option>
<?php
     $getcats = "select * from categories";
	$runcats = mysqli_query($con,$getcats);
	while($rowcats = mysqli_fetch_array($runcats)){
		$catid = $rowcats['cat_id'];
		$cat_title = $rowcats['cat_title'];
		echo "<option value = '$catid'>$cat_title</option>";
	}
	?>
</select></td>
</tr>

<tr>
<td><b>Product Description</b></td>
<td><!--<div class="sample-toolbar" >
		<a href="javascript:void(0)" onclick="format('bold')"><span class="fa fa-bold fa-fw"></span></a>
		<a  href="javascript:void(0)" onclick="format('italic')"><span  class="fa fa-italic fa-fw"></span></a>
		<a  href="javascript:void(0)" onclick="format('insertunorderedlist')"><span  class="fa fa-list fa-fw"></span></a>
</div>

<div class="editor" id="sampleeditor">-->
	<textarea name = "productDesc"></textarea></td>
</tr>
<tr>
<td><b>Product Price</b></td>
<td><input type = "text" name = "productPrice"></input></td>
</tr>
<tr>
<td><b>Product Image</b></td>
<td><input type = "file" name = "productImage"></input></td>
</tr>
<tr>
<td><b>Product Keywords</b></td>
<td><input type = "text" name = "productKeywords"></input></td>
</tr>
<tr>
<td><input type = "submit" name ="insert_post" value ="Submit"></input></td>
</tr>
</table>
</form>
<!--<script>
		window.addEventListener('load', function(){
			document.getElementById('sampleeditor').setAttribute('contenteditable', 'true');
			document.getElementById('sampleeditor2').setAttribute('contenteditable', 'true');
        });

		function format(command, value) {
			document.execCommand(command, false, value);
		}

		function setUrl() {
			var url = document.getElementById('txtFormatUrl').value;
			var sText = document.getSelection();
			document.execCommand('insertHTML', false, '<a href="' + url + '" target="_blank">' + sText + '</a>');
			document.getElementById('txtFormatUrl').value = '';
		}
	</script>-->
	
	<form action = "insertproducts.php" method = "post" enctype ="multipart/form-data">
	<table>
		<tr>
		<td><b>Category</b></td>
		<td><input type = "text" name = "cat_title"></input><input type = "submit" name ="insert_post1" "value ="Submit"></input></td>
		</tr>
	</table>
	</form>
	<form action = "insertproducts.php" method = "post" enctype ="multipart/form-data">
	<table>
	    <tr>
		<td><b>Brand</b></td>
		<td><input type = "text" name = "brand_title"></input><input type = "submit" name ="insert_post2" "value ="Submit"></td>
		</tr>
		</table>
	</form>
</body>
</html>
<?php
if(isset($_POST['insert_post'])){
     $producttitle = $_POST['productTitle'];
     $productcat = $_POST['productCat'];
    
     $productprice = $_POST['productPrice'];
     $productdesc = $_POST['productDesc'];
     $productkeywords = $_POST['productKeywords'];

       $productimage = $_FILES['productImage']['name'];
       $productimagetemp = $_FILES['productImage']['tmp_name'];
	   move_uploaded_file($productimagetemp,"product_images/$productimage");

     $insert_product = "insert into product(productCat,productTitle,productPrice,productDesc,productImage,productKeywords) values('$productcat','$producttitle','$productprice','$productdesc','$productimage','$productkeywords')";
     $insert_pro = mysqli_query($con,$insert_product);
	 if($insert_pro){
		 echo "<script>alert('Product has been inserted')</script>";
		 echo "<script>window.open('insertproducts.php','_self')</script>";
	 }
}

if(isset($_POST['insert_post1'])){
	$cat_title = $_POST['cat_title'];
	 $insert_cat = "insert into categories(cat_title) values('$cat_title')";
    if($insert_cat){
		 echo "<script>alert('Category has been inserted')</script>";
		 echo "<script>window.open('insertproducts.php','_self')</script>";
	 }
}

if(isset($_POST['insert_post2'])){
	$brand_title = $_POST['brand_title'];
	$insert_brand = "insert into brand(brand_title) values('$brand_title')";
    if($insert_brand){
		 echo "<script>alert('Brand has been inserted')</script>";
		 echo "<script>window.open('insertproducts.php','_self')</script>";
	 }

}
?>