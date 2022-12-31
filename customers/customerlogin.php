<?php
$con = mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['login'])){
     $email_address = $_POST['email_address'];
	 $customer_password = $_POST['customer_password'];
	 
	 $s = "select * from customer where email_address = '$email_address' && customer_password = '$customer_password'"; 
	 $result = mysqli_query($con,$s);
	 $num = mysqli_num_rows($result);
	 if($num  == 1)
	 {
		 header('location:index.php');
	 }
	 else{
		echo "
			 <script>alert(' Login Failed. Please try again. ')</script>
			
			";
	 }
}
	?>