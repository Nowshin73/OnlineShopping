<!DOCTYPE html>
<?php
include("conn.php");
//include("conn2.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
</head>
<body>
  	
	<form action = "insertcat.php" method = "post" enctype ="multipart/form-data">
        <table>
            <tr>
            <td><b>Category</b></td>
            <td><input type = "text" name = "cat_title"></input><input type = "submit" name ="insert_post1" "value ="Submit"></input></td>
            </tr>
        </table>
        </form>
</body>
</html>
<?php
if(isset($_POST['insert_post1'])){
	$cat_title = $_POST['cat_title'];
	 $insert_cat = "insert into categories(cat_title) values('$cat_title')";
     $insert_pro = mysqli_query($con,$insert_cat);
    if($insert_cat){
		 echo "<script>alert('Category has been inserted')</script>";
		 echo "<script>window.open('insertcat.php','_self')</script>";
	 }
}
?>