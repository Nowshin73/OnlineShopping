<?php
$con = mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['signup'])){
     $email_address = $_POST['email_address'];
     $customer_password = $_POST['customer_password'];
     $insert_customer = "insert into customer(email_address,customer_password)
	 values('$email_address','$customer_password')";
     $insert_cus = mysqli_query($con,$insert_customer);
	 if($insert_cus){
		 echo "<script>alert('Account has been created')</script>";
		 header('location:index.php');
	 }
}
?>