<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
require_once('connect.php');
$productname=$_POST['productname'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$manufacturer=$_POST['manufacturer'];
$manufactureddate=$_POST['manufactureddate'];
$expiredate=$_POST['expiredate'];
$sql="INSERT into tbl_items(productname,price,quantity,manufacturer,manufactureddate,expiredate)
VALUES('$productname','$price','$quantity','$manufacturer','$manufactureddate','$expiredate')";
$query=mysqli_query($conx,$sql)or die(mysqli_error($conx));
$affectedrows=mysqli_affected_rows($conx);
if($affectedrows>0){
	echo"registerd sucessfully";
}
else{
	echo"error could not be registerd";
	exit;
}

?>

<a href="additems.php">return</a>