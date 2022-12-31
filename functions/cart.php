<?php
$con = mysqli_connect("localhost","root","","ecommerce");
function getIp(){
    $ip = $_SERVER['REMOVE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']
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
            echo "<script>window.open('index.php','self')</script>"
        }


    }
}


?>