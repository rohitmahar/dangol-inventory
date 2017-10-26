<?php
session_start();
if(!isset($_SESSION['sessid'])){
	header('location:design.php');
}
?>
<?php
// require_once('connect.php');

//$id = $_GET['eid'];

// $productname=$_POST['productname'];
// $price=$_POST['price'];
// $quantity=$_POST['quantity'];
// $manufacturer=$_POST['manufacturer'];
// $manufactureddate=$_POST['manufactureddate'];
// $expiredate=$_POST['expiredate'];
// $sql="UPDATE  tbl_items set productname = 'hellaa', price = 'rohit',quantity = 'maharjan',manufacturer = 'aaaa', manufactureddate = '2012/5/15',expiredate ='2012/5/18'  where id = 8 ";
// $query=mysqli_query($conx,$sql)or die(mysqli_error($conx));
// $affectedrows=mysqli_affected_rows($conx);
// if($affectedrows>0){
// 	echo"Updated sucessfully";
// 	header('location:editinventory.php');
// }
// else{
// 	echo"error could not be registerd";
// 	exit;
// }

include 'connect.php';

if(isset($_POST['update'])){
	foreach ($_POST as $key => $value) {
		$$key=$value;
	}

	$sql="update tbl_items set productname='$productname',
								price='$price',
								quantity='$quantity',
								manufacturer='$manufacturer',
								manufactureddate='$manufactureddate',
								expiredate='$expiredate' where id='$p_id'";
	$query=mysqli_query($conx,$sql);

	if($query){
		echo "updated";
		header('location:editinventory.php');
	}else{
		echo "something went wrong";
	}

}

?>